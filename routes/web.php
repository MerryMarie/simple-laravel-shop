<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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

Route::get('/', [ProductController::class, 'index'])->name("home");

Route::controller(LoginController::class)->group(function() {

    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});


Route::controller(CartController::class)->middleware('auth')->group(function() {
    Route::get('/cart', 'index')->name('cart');
    Route::get('/cart/add/{product}',  'addToCart')->name('cart.add');
    Route::get('/cart/remove/{product}', 'removeFromCart')->name('cart.remove');
    Route::get('/cart/clear','cartClear')->name('cart.clear');

    Route::get('/cart/o/{product}','cartO')->name('cart.o');
});

