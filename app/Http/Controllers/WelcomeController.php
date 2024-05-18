<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newjobs;

class WelcomeController extends Controller
{
    
    public function welcome(){
        return view('home');

    }

}
