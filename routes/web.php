<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\user_pageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// LOGIN
Route::get('/',[AuthController::class,'login']);
Route::post('/',[AuthController::class,'masuk']);
Route::get('/logout',[AuthController::class,'logout']);


// ADMIN
Route::get('/dashboard',[AdminController::class,'index'])->name('admin.index');
Route::post('/dashboard',[AdminController::class,'store'])->name('admin.store');
Route::get('/dashboard/{id_user}',[AdminController::class,'destroy'])->name('admin.destroy');
Route::get('/dashboard/edit/{id_user}',[AdminController::class,'edit'])->name('admin.edit');
Route::put('/dashboard/update/{id_user}',[AdminController::class,'update'])->name('admin.update');
// Route::get('/dashboard/edit/{id_user}', [AdminController::class, 'edit'])->name('admin.edit');
// Route::put('/dashboard/{id}', [AdminController::class, 'update'])->name('admin.update');

// KOUR
Route::get('/kour', function () {
    return view('kour.kour');
});
Route::get('/lihatkour', function () {
    return view('kour.lihatkour');
});

// PEJABAT
Route::get('/pejabat', function () {
    return view('pejabat');
});

// PELAKSANA
Route::get('/pelaksana', function () {
    return view('pelaksana.pelaksana');
});
Route::get('/lihat', function () {
    return view('pelaksana.lihatpelaksana');
});

// User
Route::get('/user',[user_pageController::class, 'index'])->name('user.index');
Route::get('/user/pengajuan',[user_pageController::class, 'create'])->name('user.create');
Route::get('/kategori/{id_kategori}', [user_pageController::class, 'getKategoriDetail']);



// Login
Route::get('/',[AuthController::class,'login']);
Route::post('/',[AuthController::class,'masuk']);
Route::get('/logout',[AuthController::class,'logout']);