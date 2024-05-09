<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view("users.register");
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create($validatedData);
        Auth::login($user);
        return redirect('register')->with('success', 'Registration successfull! Please login');
    }
}
