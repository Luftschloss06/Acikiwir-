<?php

use App\http\Controllers\HomeController; 
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//  //return view('welcome');
//    return "Sistem Informasi - Route";
//});
Route::get('/', [HomeController::class, 'index'])->name('home'); 
Route::get('/well', function(){return view('welcome');});
Route::get('/posts', [PostController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
