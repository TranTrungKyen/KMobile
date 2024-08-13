<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
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
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('create');
            Route::post('/store', [AdminUserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('edit');
            Route::get('/detail/{id}', [AdminUserController::class, 'detail'])->name('detail');
            Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('update');
            Route::post('/active/{id}', [AdminUserController::class, 'active'])->name('active');
            Route::post('/reset-password/{id}', [AdminUserController::class, 'resetPassword'])->name('reset-password');
            Route::post('/delete/{id}', [AdminUserController::class, 'delete'])->name('delete');
        });

        Route::prefix('brand')->name('brand.')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('index');
            Route::get('/create', [BrandController::class, 'create'])->name('create');
            Route::post('/store', [BrandController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [BrandController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [BrandController::class, 'delete'])->name('delete');
        });

        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
        });

        Route::prefix('sale')->name('sale.')->group(function () {
            Route::get('/', [SaleController::class, 'index'])->name('index');
        });

        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
        });

        Route::prefix('color')->name('color.')->group(function () {
            Route::get('/', [ColorController::class, 'index'])->name('index');
        });
    });
});
