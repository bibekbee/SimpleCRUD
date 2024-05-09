<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Newjobs;
use App\Models\User;

class indexController extends Controller
{
    public function index(){
       return view("store");
    }

    public function welcome(){
        $allJobs = Newjobs::paginate(3);
        return view('welcome', compact('allJobs'));

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

        return redirect()->route('show');
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
            return redirect('/');
        }
    }

    public function showTwo(Newjobs $job){
        return view("showTwo", ['job'=>$job]);
    }

    public function edit(Newjobs $job){
        $editJob = $job;
        return view("edit", compact('editJob'));
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

    public function delete(Request $request){
        $job = Newjobs::findorfail($request->id);
        $job->delete();
        return redirect('/show');
    }
    
}
