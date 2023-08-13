<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



    Route::resource('categories', 'CategoriesController');
    Route::resource('products', 'ProductController');
    Route::post('/register', 'PassportController@register');
    Route::post('/login', 'PassportController@login');


Route::middleware(['auth:api'])->group(function(){

    Route::post('/logout', 'PassportController@logout');
	Route::get('/carts', 'CartController@index');
    Route::resource('address', 'AddressController');

    // cart routes
	Route::delete('/carts/{product_id}', 'CartController@removeFromCart');
    Route::post('/carts/{product_id}', 'CartController@addToCart');


    // Order routes


    Route::resource('orders', 'orderController');

	Route::post('/orders/buy-now', 'OrderController@buyNow');

});
