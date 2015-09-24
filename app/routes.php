<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('create');
});
Route::post('/order/update','OrderController@updateOrder');
Route::any('/order/{id}/cancel','OrderController@cancelOrder');
Route::any('/order/{id}/payment','OrderController@paymentOrder');
Route::put('/order/{id}','OrderController@getFilledOrder');
Route::get('order/today','OrderController@getTodayOrder');
Route::get('order/{id}','OrderController@getOrder');
Route::get('order/search/{email?}','OrderController@search');
Route::post('order','OrderController@addOrder');
