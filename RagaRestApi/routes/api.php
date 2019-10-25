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

/*
Route::get('account','Account\AccountController@account');
Route::get('account/{id}','Account\AccountController@accountByID');
Route::post('account','Account\AccountController@accountSave');
Route::put('account/{id}','Account\AccountController@accountUpdate');
Route::delete('account/{id}','Account\AccountController@accountDelete');
*/
Route::apiResource('account', 'Account\Account');
Route::group(['middleware' => 'auth:api'], function()
{
    
});
