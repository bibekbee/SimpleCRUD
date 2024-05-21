<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\indexController;
use Illuminate\Http\Request;
use App\Mail\firstMailSender;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use App\Jobs\aJobLogger;

Route::get('/', [WelcomeController::class, 'welcome']);
Route::post('/', [ViewController::class, 'logout']);

Route::get('products', [ProductController::class, 'index']);
Route::get('products/create', [ProductController::class, 'create']);
Route::post('products/create', [ProductController::class, 'store']);
Route::get('products/{id}', [ProductController::class, 'deleteUpdate'])->middleware('auth');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->can('edit', 'product');
Route::patch('products/{id}', [ProductController::class, 'update'])->middleware('auth');
Route::delete('products/{id}', [ProductController::class, 'delete'])->middleware('auth');

Route::get('create', [indexController::class, 'create'])->middleware('auth');
Route::post('create', [indexController::class, 'store']);
Route::get('show', [indexController::class, 'show']);
Route::get('show/{job}', [indexController::class, 'deleteUpdate'])->name('update')->middleware('auth')->can('edit','job');
Route::get('show/{job}/edit', [indexController::class, 'edit'])->name('edit')->middleware('auth')->can('edit','job');
Route::patch('store/{id}', [indexController::class, 'update'])->middleware('auth')->can('edit','job');
Route::delete('store/{id}', [indexController::class, 'delete'])->middleware('auth')->can('edit','job'); 

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'create'])->name('register');
Route::get('signin', [SigninController::class, 'index'])->name('login');
Route::post('signin', [SigninController::class, 'show'])->name('login');

Route::get('setting', function(){
    $user = Auth::user();
    // dd($user);
    return view('profile', ['user' => $user]);
})->name('setting')->middleware('auth');

Route::post('setting', function(){
    $user = Auth::user();
    $user->delete();
    return redirect('setting');
});

Route::patch('setting', function(Request $request){
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
});

Route::post('setting/edit', function(Request $request){
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

});

Route::get('mail', function (){
    Mail::to('at@test.sisnetelecenter.org')
        ->send( new firstMailSender('Bibek'));
    return "Email sent 👏🏽";
});


Route::get('doajob', function(){
    aJobLogger::dispatch();
});





 