<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Newjobs;

use App\Models\User;

class indexController extends Controller
{
    public function create(){
       return view("storeMembers")->with("name", "store");
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|max:100'
        ]);

        $user = Auth::user();
         Newjobs::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'user_id' => $user->id
        ]);

        return redirect('show');
    }

    public function show(Request $request){
        $data = $request['search'] ?? ''; 
        $user = Auth::user(); 
        if($user){

        if($data != ''){
            $allJobs = Newjobs::where('first_name', 'LIKE', "$data%")->get();
        }else{
            $allJobs = $user->newjobs;
        }
            return view("show", compact('allJobs', 'data'));
        }else{
            return view('show', ['allJobs' => Newjobs::all()])->with('data', '');
        }
    }

    public function deleteUpdate(Newjobs $job){
        return view("dupage", ['job'=>$job])->with('message', 'store');
    }

    public function edit(Newjobs $job){
        $editJob = $job;
        $name = 'update';
        return view("storeMembers", compact('editJob', 'name'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|max:100'
        ]);
        $job = Newjobs::findorfail($request->id);
        $job->update($validatedData);
        return redirect('/show');
    }

    public function delete(Newjobs $job){
        // $job = Newjobs::findorfail($request->id);
        $job->delete();
        return redirect('/show');
    }
    
}
