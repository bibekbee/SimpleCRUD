<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class SigninController extends Controller
{
    public function index (){
        return view('users.signin');
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
}
