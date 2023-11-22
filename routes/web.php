<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\kourController;
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
Route::get('/kour',[kourController::class,'index'])->name('kour.index');
Route::get('/kour-discuss/{id}',[kourController::class,'discussion'])->name('kour.discuss');
Route::post('/kour-discuss-store', [user_pageController::class, "storeDiscuss"])->name('kour.store_discuss');
Route::get('/kour-discuss/{id}/download', [user_pageController::class, 'download'])->name('kour.download');

// PEJABAT
Route::get('/pejabat', function () {
    return view('pejabat.pejabat');
});
Route::get('/lihatpejabat', function () {
    return view('pejabat.lihatpejabat');
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
Route::post('/user/pengajuan',[user_pageController::class, 'store'])->name('user.store');

Route::get('/kategori/{id_kategori}', [user_pageController::class, 'getKategoriDetail']);
Route::get('/lihatuser/{id}',[user_pageController::class,"detailUser"])->name('user.detail');
Route::post('/store-discuss', [user_pageController::class, "storeDiscuss"])->name('store.discuss');
Route::get('/lihatuser/{id}/download', [user_pageController::class, 'download'])->name('surat.download');




// Login
Route::get('/',[AuthController::class,'login']);
Route::post('/',[AuthController::class,'masuk']);
Route::get('/logout',[AuthController::class,'logout']);