<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
            $user = Auth::user();
            // dd($user);
            return view('profile', ['user' => $user]);
    }

    public function editName(Request $request){
        $validate = $request->validate([
            'name' => 'required|string|'
        ]);
    
        $user = Auth::user();
    
        if ($validate['name'] === $user->name) {
            return redirect('setting');
        }else{
            $user->update([
                'name' => $validate['name']
            ]);
        }
    
        return redirect('setting');
    
    }
    
    public function updatePass(Request $request){
        $validate = $request->validate([
            'oldpassword' => 'required|current_password',
            'newpassword' => 'required|confirmed',
            'newpassword_confirmation' => 'required'
        ]);
        $user = Auth::user();
        $user->update([
            'password' => bcrypt($validate['newpassword'])
        ]);
        Auth::logout();
        return redirect('/');
    }

    public function delete(){
            $user = Auth::user();
            $user->delete();
            return redirect('setting');
    }
}
