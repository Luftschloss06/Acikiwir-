<?php

use App\http\Controllers\HomeController; 
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Route::get('/', function () {
//  //return view('welcome');
//    return "Sistem Informasi - Route";
//});

Auth::routes([
    'verify' => true,
    'register' => false
]);

Route::get('/', [HomeController::class, 'index'])->name('home'); 
Route::get('/well', function(){return view('welcome');});
Route::get('/posts', [PostController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/proteksi-1', [App\Http\Controllers\HomeController::class, 'proteksi_1'])->name('proteksi.1')->middleware('auth');
Route::get('/tambah', [App\Http\Controllers\CrudController::class, 'tambah'])->name('get.tambah');
route::post('/tambah/proses', [App\Http\Controllers\CrudController::class, 'proses_tambah'])->name ('post.tambah');

Route::prefix('admin')->group(function (){

    route::middleware(['auth', 'verified', 'user.role:admin'])->group(function(){
        route::get('/proteksi-1', [App\http\Controllers\HomeController::class, 'proteksi_1_admin'])->name('admin.proteksi.1');
    });
});

Route::prefix('staff')->group(function () {

    route::middleware(['auth', 'verified', 'user.role:staff'])->group(function () {
        Route::get('/proteksi-1', [App\Http\Controllers\HomeController::class, 'proteksi_1_staff'])->name('staff.proteksi.1'); 
    });
});
