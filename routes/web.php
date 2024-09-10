<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\StorageController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\NewsController as UserNewsController;
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

Route::middleware('checkAuthValidity')->name('user.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [UserLoginController::class, 'index'])->name('login');
        Route::post('/login-account', [UserLoginController::class, 'login'])->name('login-account');
    });

    Route::get('/', [UserController::class, 'index'])->name('home');

    Route::get('/logout', [UserLoginController::class, 'logout'])->name('logout');
    Route::post('/register', [UserController::class, 'register'])->name('register');

    Route::middleware('auth')->group(function () {
        Route::prefix('cart')->name('cart.')->group(function () {
            Route::get('/', [CartController::class, 'index'])->name('index');
            Route::post('/store', [CartController::class, 'store'])->name('store');
            Route::put('/update', [CartController::class, 'update'])->name('update');
            Route::delete('/delete', [CartController::class, 'delete'])->name('delete');
            Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
        });

        Route::prefix('order')->name('order.')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::post('/store', [OrderController::class, 'store'])->name('store');
            Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('detail');
            Route::post('/complete-status/{id}', [AdminOrderController::class, 'completeStatus'])->name('complete-status');
            Route::post('/cancel-status/{id}', [AdminOrderController::class, 'cancelStatus'])->name('cancel-status');
        });
    });

    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [UserNewsController::class, 'index'])->name('index');
        Route::get('/detail', [UserNewsController::class, 'detail'])->name('detail');
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [UserProductController::class, 'products'])->name('index');
        Route::get('/detail/{id}', [UserProductController::class, 'productDetail'])->name('detail');
        Route::get('/find', [UserProductController::class, 'findProductsByName'])->name('findProductsByName');
        Route::get('/brand/{id}', [UserProductController::class, 'findProductsByBrand'])->name('brand');
        Route::get('/category/{id}', [UserProductController::class, 'findProductsByCategory'])->name('category');
    });
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
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        });

        Route::prefix('sale')->name('sale.')->group(function () {
            Route::get('/', [SaleController::class, 'index'])->name('index');
            Route::get('/create', [SaleController::class, 'create'])->name('create');
            Route::get('/find', [SaleController::class, 'find'])->name('find');
            Route::post('/store', [SaleController::class, 'store'])->name('store');
            Route::post('/delete/{id}', [SaleController::class, 'delete'])->name('delete');
            Route::get('/detail/{id}', [SaleController::class, 'detail'])->name('detail');
        });

        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('store-product');
            Route::get('/create-detail', [ProductController::class, 'createDetail'])->name('create-detail');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::post('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
            Route::post('/active/{id}', [ProductController::class, 'active'])->name('active');
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

        Route::prefix('statistical')->name('statistical.')->group(function () {
            Route::get('/', [AdminOrderController::class, 'statistical'])->name('index');
            Route::post('/find', [AdminOrderController::class, 'getRevenueData'])->name('find');
        });

        Route::prefix('order')->name('order.')->group(function () {
            Route::get('/', [AdminOrderController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [AdminOrderController::class, 'detail'])->name('detail');
            Route::get('/detail-other/{id}', [AdminOrderController::class, 'detailOther'])->name('detail-other');
            Route::post('/confirm-status/{id}', [AdminOrderController::class, 'confirmStatus'])->name('confirm-status');
            Route::post('/complete-status/{id}', [AdminOrderController::class, 'completeStatus'])->name('complete-status');
            Route::post('/cancel-status/{id}', [AdminOrderController::class, 'cancelStatus'])->name('cancel-status');
        });
    });
});
