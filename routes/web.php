<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'addProductToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeProductFromCart']);
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'index'])->name('product');

Route::prefix('/auth')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'perform'])->name('login.perform');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/admin')->middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard.index');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    });

    Route::prefix('/products')->group(function () {

        Route::get('/', [ProductController::class, 'index']);
        Route::get('/delete/{id}', [ProductController::class, 'delete']);

        Route::get('/create', [ProductController::class, 'create']);
        Route::post('/create', [ProductController::class, 'createPost']);
    });
});