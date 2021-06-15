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
Route::group(['prefix' => 'api','as' => 'api.mpesa.','namespace' => 'Api\Payment\Mpesa'], function() {
	Route::group(['as' => 'c2b.'], function(){
		Route::get('m-trx/confirm/{confirmation_key}', 'C2BController@confirmtrx');
		Route::get('m-trx/validate/{validation_key}', 'C2BController@validatetrx')->name('validate');
			});
});
