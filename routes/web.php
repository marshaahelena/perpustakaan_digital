<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingBookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPustakawanController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\registrasicontroller;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/form', function () {
//     return view('login');
// })->name('login');
Route::get('/header', function () {
    return view('layout/header');
});
// Route::get('/coba', function () {
//     return view('book_donation.data');
// });

Route::get('/tes', function () {
    return view('layout.Home');
});
Route::get('/detail', function () {
    return view('book-list.detail');
});
Route::get('/coba', function () {
    return view('coba');
});

Route::get('/', function() {
    return redirect()->route('index');
});

Route::get('/login', [AuthController::class, 'login'])->name("login");
Route::post('/login', [AuthController::class, 'authentication'])->name("auth.authentication");

Route::get('/register', [AuthController::class, 'register'])->name("auth.register");
Route::post('/register', [AuthController::class, 'store'])->name("auth.store");

Route::get('/dashboardAdmin', [DashboardAdminController::class, 'index'])->middleware('OnlyAdmin')->name("index");

Route::get('/dashboardAnggota', [DashboardController::class, 'index'])->middleware('OnlyAnggota');

Route::get('/dashboardPustakawan', [DashboardPustakawanController::class, 'index'])->middleware('OnlyPustakawan');


Route::get('/logout', [AuthController::class, 'logout'])->name("auth.logout");
Route::get('/data', [AuthController::class, 'index'])->name("auth.index");
Route::post('/data', [AuthController::class, 'index'])->name("auth.index");

// Route::get('/count-users', [AuthController::class, 'showCountUsers'])->name('count-users');
// Route::get('header', [DashboardController::class, 'index'])->middleware('OnlyAdmin');


Route::resource('/book', BookController::class);
Route::resource('/donation', DonationController::class);
Route::resource('/borrowing', BorrowingBookController::class);
Route::resource('/user', AuthController::class);
Route::resource('/dashboard', DashboardController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/public', PublicController::class);

Route::get('/category', [BookController::class, 'showCategories'])->name('book.showCategories');
Route::get('/return', [BorrowingBookController::class, 'returnbook'])->name('borrowing.returnbook');
Route::post('/return', [BorrowingBookController::class, 'savereturnbook'])->name('borrowing.savereturnbook');
