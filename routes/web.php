<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\StorageController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ProductController as UserProductController;
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
    Route::middleware('guest')->group(function () {
        Route::get('/login', [UserLoginController::class, 'index'])->name('login');
        Route::post('/login-account', [UserLoginController::class, 'login'])->name('login-account');
    });
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::prefix('cart')->middleware(['checkLoginUser'])->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/store', [CartController::class, 'store'])->name('store');
        Route::put('/update', [CartController::class, 'update'])->name('update');
        Route::delete('/delete', [CartController::class, 'delete'])->name('delete');
        Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
    });
    Route::prefix('order')->middleware(['checkLoginUser'])->name('order.')->group(function () {
        Route::post('/store', [OrderController::class, 'store'])->name('store');

    });
    Route::get('/logout', [UserLoginController::class, 'logout'])->name('logout');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::get('/product-page', [UserProductController::class, 'products'])->name('product-page');
    Route::get('/product-detail-page/{id}', [UserProductController::class, 'productDetail'])->name('product-detail-page');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/login', [LoginController::class, 'login'])->name('post-login');
    Route::middleware(['checkAuthLoginPage'])->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');
    });
    Route::middleware(['checkLoginAdmin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::prefix('user')->middleware(['checkAuthAdmin'])->name('user.')->group(function () {
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
            Route::get('/create', [SaleController::class, 'create'])->name('create');
            Route::post('/store', [SaleController::class, 'store'])->name('store');
            Route::post('/delete/{id}', [SaleController::class, 'delete'])->name('delete');
        });

        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('store-product');
            Route::get('/create-detail', [ProductController::class, 'createDetail'])->name('create-detail');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::post('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
        });

        Route::prefix('color')->name('color.')->group(function () {
            Route::get('/', [ColorController::class, 'index'])->name('index');
            Route::post('/store', [ColorController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ColorController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ColorController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [ColorController::class, 'delete'])->name('delete');
        });

        Route::prefix('storage')->name('storage.')->group(function () {
            Route::get('/', [StorageController::class, 'index'])->name('index');
            Route::post('/store', [StorageController::class, 'store'])->name('store');
            Route::post('/update/{id}', [StorageController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [StorageController::class, 'delete'])->name('delete');
        });

        Route::prefix('news')->name('news.')->group(function () {
            Route::get('/', [NewsController::class, 'index'])->name('index');
        });
    });
});
