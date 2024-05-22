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
use App\Http\Controllers\ProfileController;
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
Route::get('signin', [SigninController::class, 'index'])->name('login')->name('users.signin');
Route::post('signin', [SigninController::class, 'show'])->name('login');
Route::post('signin/edit', [SigninController::class, 'passMail']);
Route::get('signin/{token}', [SigninController::class, 'passReset'])->name('passwordReset');
Route::patch('signin/{token}', [SigninController::class, 'passUpdated']);

Route::get('setting', [ProfileController::class, 'index'] )->name('setting')->middleware('auth');
Route::post('setting/edit', [ProfileController::class, 'editName'])->middleware('auth');
Route::patch('setting', [ProfileController::class, 'updatePass'])->middleware('auth');
Route::post('setting', [ProfileController::class, 'delete'])->middleware('auth');

Route::get('mail', function (){
    Mail::to('at@test.sisnetelecenter.org')
        ->send( new firstMailSender('Bibek'));
    return "Email sent 👏🏽";
});

Route::get('doajob', function(){
    aJobLogger::dispatch();
});





 