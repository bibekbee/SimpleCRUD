<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [indexController::class, 'welcome']);
Route::post('/', [ViewController::class, 'logout']);

Route::get('/store', [indexController::class, 'index'])->middleware('auth');
Route::post('/store', [indexController::class, 'store']);
Route::get('/show', [indexController::class, 'show'])->name('show');
Route::get('show/{job}', [indexController::class, 'showTwo'])->name('showTwo')->middleware('auth')->can('edit','job');
Route::get('show/{job}/edit', [indexController::class, 'edit'])->name('edit')->middleware('auth')->can('edit','job');
Route::patch('store/{id}', [indexController::class, 'update']);
Route::delete('store/{id}', [indexController::class, 'delete']);

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'create'])->name('register');
Route::get('signin', [SigninController::class, 'index'])->name('login');
Route::post('signin', [SigninController::class, 'show'])->name('login');




 