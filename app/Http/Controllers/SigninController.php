<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Validation\ValidationException;


class SigninController extends Controller
{
    public function index ($success = null){
        return view('users.signin', ['success' => $success]);
    }

    public function show(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
       if(! Auth::attempt($validated)){
        throw ValidationException::withMessages([
            'email' => 'Sorry the credentials do not match'
        ]);
       }
        request()->session()->regenerate();

        return redirect('/');
    }

    public function passMail(Request $request){
        $validated = $request->validate([
            'email' => 'required|email|exists:users'
        ]);
        $user = User::where('email', $request->email)->first();
        $token = Str::random(64);
        $exist = DB::table('password_reset_tokens')->where('email', $request->email)->first();
        if($exist){
            return $this->index("Failed to send the Mail");
        }else{
            DB::table('password_reset_tokens')->insert([
                'email' => $validated['email'],
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }

        Mail::send('mails.forgotpass', ['token' => $token, 'user' => $user], function($msg) use ($user){
            $msg->to($user->email, $user->name)
                ->subject("Password Reset");
        });

        return $this->index("Mailsent successfully");
    }

    public function passReset(){
        return view('forgotpass');
    }

    public function passUpdated($token, Request $request){
        $request->validate([
            'newpassword' => 'required|confirmed',
            'newpassword_confirmation' => 'required'
        ]);
        $userMail = DB::table('password_reset_tokens')->where('token', $token)->first();;
        if(!$userMail){
            abort(403);
        }
        $user = User::where('email', $userMail->email);
        $user->update([
            'password' => bcrypt($request->newpassword)
        ]);
        Auth::logout();
        return redirect('/');
    }
}
