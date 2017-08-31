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
    return view('index');
});

Route::get('blank', function(){
	return view('pages.blank');
});

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['prefix' => 'admin','middleware' => ['auth', 'role:admin']], function(){
//   	Route::resource('user', 'UserController', ['names' => 'user']);
//   	Route::resource('hot_offer', 'HotOfferController', ['names' => 'hot_offer']);
//   	Route::resource('category','CategoryController', ['names' => 'category']);
//   	Route::resource('item', 'ItemController', ['names' => 'item']);
//   	Route::resource('topcat', 'TopCatController', ['names' => 'topcat']);
//   	Route::resource('topping', 'ToppingController', ['names' => 'topping']);
//     Route::get('order', 'OrderController@index')->name('order.list');
//     Route::get('order/{order}/edit', 'OrderController@edit')->name('order.edit');
//     Route::put('order/{order}/update', 'OrderController@update')->name('order.update');
// });

Route::group(['prefix' => 'manager','middleware' => ['auth', 'role:manager']], function(){
    Route::resource('user', 'UserController', ['names' => 'user']);
    Route::get('order', 'OrderController@getOrderDelivered')->name('order.delivered');
    Route::get('oreder/{order}/show', 'OrderController@show')->name('ordermanager.show');
    Route::post('order/report', 'OrderController@postOrderDate')->name('order.date');
});

Route::group(['middleware' => ['auth', 'role:supervisor']], function(){
  	Route::resource('hot_offer', 'HotOfferController', ['names' => 'hot_offer']);
  	Route::resource('category','CategoryController', ['names' => 'category']);
  	Route::resource('item', 'ItemController', ['names' => 'item']);
  	Route::resource('topcat', 'TopCatController', ['names' => 'topcat']);
  	Route::resource('topping', 'ToppingController', ['names' => 'topping']);
    Route::get('order', 'OrderController@index')->name('order.list');
    Route::get('oreder/{order}/show', 'OrderController@show')->name('order.show');
    Route::get('order/{order}/edit', 'OrderController@edit')->name('order.edit');
    Route::put('order/{order}/update', 'OrderController@update')->name('order.update');
});
