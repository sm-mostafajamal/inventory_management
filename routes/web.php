<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ReportAndAnalyticsController;
use \App\Http\Controllers\UsersController;
use \App\Http\Controllers\ProductsController;
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
    Route::get('', [UsersController::class, 'login']);
    Route::post( '/authentication', [UsersController::class, 'authentication'])->name('.auth');
});


Route::get('/', [ ReportAndAnalyticsController::class, 'index' ])->name('home')->middleware('auth');

Route::middleware('auth')->prefix('/')->group( function () {
    Route::get('product-management', [ProductsController::class, 'index'])->name('product-management');
    Route::get('user-management', [UsersController::class, 'show'])->name('user-management');
    Route::match(['get', 'post'],'logout', [UsersController::class, 'logout'])->name('logout');
});
