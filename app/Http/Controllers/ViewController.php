<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
