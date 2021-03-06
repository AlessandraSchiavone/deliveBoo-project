<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')
    ->group(function() {

        Route::get('restaurant', 'RestaurantController@index');
        Route::get('restaurant/{slug}', 'RestaurantController@show');
        Route::get('cuisine', 'CuisineController@index');
        Route::get('category', 'CategoryController@index');
        Route::get('token', 'TokenController@index');
        Route::post('token', 'TokenController@post');
    });
