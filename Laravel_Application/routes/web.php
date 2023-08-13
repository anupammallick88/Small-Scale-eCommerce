<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');

Route::resource('categories', 'CategoriesController');



Route::middleware(['auth'])->group(function () {

	Route::resource('address', 'AddressController');

	Route::get('/carts', 'CartController@index');

	Route::post('/carts/{product_id}', 'CartController@update');

	Route::get('/carts/clear', 'CartController@destroy');

	Route::post('/carts/update/product/{product_id}', 'CartController@updateProductQuantity');

	Route::get('/orders/create/{address_id}', 'OrderController@store');

	Route::get('/orders', 'OrderController@index');

	Route::get('/orders/{id}', 'OrderController@show');

	Route::get('orders/address/{address_id}', 'OrderController@finalReport');

});

