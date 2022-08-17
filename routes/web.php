<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('front.home');
});

Route::get('/cart', function () {
    return view('front.cart');
});



Route::prefix('/admin')->group(function () {

    Route::prefix('/auth')->group(function () {

        Route::get('/login', function () {
            return view('admin.auth.login');
        });

        Route::get('/logout', function () {
            return view('admin.auth.logout');
        });
    });

    Route::get('/', function () {
        return view('admin.dashboard.index');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    });

    Route::prefix('/products')->group(function () {

        Route::get('/', function () {
            return view('admin.products.index');
        });

        Route::get('/edit', function () {
            return view('admin.products.edit');
        });
    });
});


// Route::get('/', 'HomeController@index')->name('home.index');

// Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {

//     Route::get('/admin', 'HomeController@index')->name('admin.dashboard.index');

//     Route::group(['middleware' => ['guest']], function () {
//         Route::get('/login', 'LoginController@show')->name('login.show');
//         Route::post('/login', 'LoginController@login')->name('login.perform');
//     });

//     Route::group(['middleware' => ['auth']], function () {
//         Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
//     });
// });