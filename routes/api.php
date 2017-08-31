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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1', 'middleware' => ['api']], function(){
	Route::get('hot_offer', 'HotOfferController@apiHotOffer');
	Route::get('category', 'CategoryController@apiCategory');
	Route::post('item', 'ItemController@apiItem');
	Route::post('item/detail', 'ItemController@apiItemDetail');
	Route::post('check', 'OrderController@checkCustomer');
	Route::post('order', 'OrderController@postOrder');
	Route::get('order/newlist', 'OrderController@getNewOrder');
});
