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


Auth::routes();

//
Route::middleware('auth') 
    ->namespace('Admin') 
    ->name('admin.') 
    ->prefix('admin') 
    ->group(function() {
        Route::get('/', 'RestaurantController@index')->name('home');
        Route::resource('restaurants', 'RestaurantController');
        Route::resource('restaurants/{restaurant}/dishes', 'DishController');
});

Route::get('/checkout', function () {
        return view('endCheckout');
        })->name('checkout');
    Route::get('/checkoutf', function () {
        return view('checkoutFailed');
        })->name('checkoutf');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('{any?}', 'HomeController@index')->where('any', '.*')->name('home');
