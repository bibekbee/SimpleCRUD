<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newjobs;

class WelcomeController extends Controller
{
    
    public function welcome(){
        $allJobs = Newjobs::latest()->paginate(4);
        return view('welcome', compact('allJobs'));

    }

}
