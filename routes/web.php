<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/login', [LoginController::class, 'login'])->name('post-login');
    Route::middleware(['checkAuthLoginPage'])->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');
    });
    Route::middleware(['checkLoginAdmin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('create');
            Route::post('/store', [AdminUserController::class, 'store'])->name('store');
        });
    });
});
