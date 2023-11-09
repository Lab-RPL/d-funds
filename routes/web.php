<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
// admin
Route::get('/dashboard',[AdminController::class,"index"])->name('admin.index');
Route::post('/dashboard',[AdminController::class,"store"])->name('admin.store');


// kour
Route::get('/kour', function () {
    return view('kour');
});

// pejabat
Route::get('/pejabat', function () {
    return view('pejabat');
});

// pelaksana
Route::get('/pelaksana', function () {
    return view('pelaksana');
});

// User
Route::get('/user', function () {
    return view('user');
});

// Login
Route::get('/',[AuthController::class,'login']);
Route::post('/',[AuthController::class,'masuk']);
Route::get('/logout',[AuthController::class,'logout']);