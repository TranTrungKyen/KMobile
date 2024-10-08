<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\UserController;
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

Route::name('user.')->group(function () {
    Route::get('/login', [UserLoginController::class, 'index'])->name('login');
    Route::get('/', [UserController::class, 'index'])->name('home');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});
