<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return "Sistem Informasi - Route";
});
Route::get('/well', function(){return view('welcome');});
Route::get('/posts', [PostController::class, 'index']);