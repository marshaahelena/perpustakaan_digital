<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\registrasicontroller;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/form', function () {
    return view('login');
})->name('login');
Route::get('/header', function () {
    return view('dashboard/header');
});
Route::get('/coba', function () {
    return view('login2');
});
Route::get('/daftar', function () {
    return view('register');
})->name('registrasi');

Route::get('/buku', function () {
    return view('book/form');
});


Route::get('/login', [AuthController::class, 'login'])->name("login");
Route::post('/login', [AuthController::class, 'authentication'])->name("auth.authentication");
Route::get('/logout', [AuthController::class, 'logout'])->name("auth.logout");
Route::get('/register', [AuthController::class, 'register'])->name("auth.register");
Route::post('/register', [AuthController::class, 'store'])->name("auth.store");


Route::resource('book', BookController::class);




