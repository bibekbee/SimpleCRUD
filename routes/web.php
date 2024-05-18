<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\indexController;
use App\Mail\firstMailSender;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;


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
Route::get('show', [indexController::class, 'show'])->name('show');
Route::get('show/{job}', [indexController::class, 'deleteUpdate'])->name('update')->middleware('auth')->can('edit','job');
Route::get('show/{job}/edit', [indexController::class, 'edit'])->name('edit')->middleware('auth')->can('edit','job');
Route::patch('store/{id}', [indexController::class, 'update']);
Route::delete('store/{id}', [indexController::class, 'delete']);

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'create'])->name('register');
Route::get('signin', [SigninController::class, 'index'])->name('login');
Route::post('signin', [SigninController::class, 'show'])->name('login');

Route::get('mail', function (){
    Mail::to('example@gmail.com', 'Hero_Name')
        ->send( new firstMailSender('Bibek'));
    return "Email sent 👏🏽";
});




 