<?php

use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookController;

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

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'role:Admin', 'prevent.back.history'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('page.adminpage');
    })->name('admin.dashboard');

    Route::resource('/books', BookController::class)->names('admin.books');
    Route::resource('/accounts', UserController::class)->names('admin.accounts');
});

// Member Routes
Route::middleware(['auth', 'role:Member', 'prevent.back.history'])->group(function () {
    Route::get('/member/dashboard', function () {
        return view('page.homepage');
    })->name('member.dashboard');
});

// Common Routes (Bisa diakses oleh Admin dan Member)
Route::middleware(['auth', 'prevent.back.history'])->group(function () {
    Route::get('/search', [PageController::class, 'search'])->name('search');
    Route::get('/explore', [PageController::class, 'explore'])->name('explore');
    Route::get('/my-library', [PageController::class, 'myLibrary'])->name('my-library');
    Route::get('/borrowing', [BorrowingController::class, 'borrowing'])->name('borrowing');
});

// Route::get('/admin', function () {
//     return view('page.adminpage');
// });
// Route::get('/search', function () {
//     return view('page.searchpage');
// });
// Route::get('/home', function () {
//     return view('page.homepage');
// });
Route::get('/', function () {
    return view('page.blankpage');
});


// Route::resource('/admin',UserController::class);