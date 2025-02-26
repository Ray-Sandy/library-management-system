<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\StockController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Auth Routes (Hanya bisa diakses oleh guest)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout (Hanya bisa diakses oleh yang sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Admin Routes (Hanya bisa diakses oleh Admin)
Route::middleware(['auth', 'role:admin', 'prevent.back.history'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {return view('page.admin.adminpage');})->name('admin.dashboard');
    Route::resource('/history',HistoryController::class)->names('admin.history');
    Route::resource('/stocks', StockController::class)->names('admin.stocks');
    Route::resource('/accounts', UserController::class)->names('admin.accounts');
});

Route::middleware(['auth', 'role:member', 'prevent.back.history'])->prefix('member')->group(function () {
    Route::get('/explore', [ExploreController::class, 'index'])->name('member.explore');
    Route::post('/explore/borrow/{id}', [ExploreController::class, 'borrow'])->name('member.explore.borrow');
    Route::get('/mylibrary', [ExploreController::class, 'myLibrary'])->name('member.mylibrary');
    Route::post('/mylibrary/return/{id}', [ExploreController::class, 'returnBook'])->name('member.mylibrary.return');
});

// Halaman Awal (Blank Page)
Route::get('/', function () {
    return view('page.blankpage');
});
