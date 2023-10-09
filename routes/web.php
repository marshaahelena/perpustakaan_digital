<?php

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

Route::post('/register', [registrasicontroller::class, 'registrasi'])->name('register');



