<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ReportAndAnalyticsController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\OrderProductController;
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

Route::middleware('guest')->prefix('/login')->name('login')->group( function () {
    Route::get('', [UserController::class, 'login']);
    Route::post( '/authentication', [UserController::class, 'authentication'])->name('.auth');
});


Route::get('/', [ ReportAndAnalyticsController::class, 'index' ])->name('home')->middleware('auth');

Route::middleware('auth')->prefix('/')->group( function () {
    //User Management
    Route::get('user-management', [UserController::class, 'show'])->name('user-management');
    Route::post('user-management/update', [UserController::class, 'update'])->name('user-management.update');
    Route::match(['get', 'post'], 'user-management/add', [UserController::class, 'add'])->name('user-management.add');
    Route::match(['get', 'post'],'logout', [UserController::class, 'logout'])->name('logout');


    // Product Management
    Route::match(['get', 'post'], 'product-management', [ProductController::class, 'index'])->name('product-management');
    Route::match(['get', 'post'],'product-management/add', [ProductController::class, 'create'])->name('product.add');

    // Order Product
    Route::get('order-product', [OrderProductController::class, 'index'])->name('order-product');
    Route::post('order-product/purchased', [OrderProductController::class, 'store'])->name('order-product.store');
});
