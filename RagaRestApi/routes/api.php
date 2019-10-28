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
Route::get('account','Account\AuthController@account');
Route::get('account/{id}','Account\AccountController@accountByID');
Route::post('account','Account\AccountController@accountSave');
Route::put('account/{id}','Account\AccountController@accountUpdate');
Route::delete('account/{id}','Account\AccountController@accountDelete');
*/
Route::post('login', 'Auth\AuthController@login');
Route::post('register', 'Auth\AuthController@register');

Route::group(['middleware' => 'auth:api'], function()
{
    Route::apiResource('account', 'Account\Account');
    Route::apiResource('sport', 'Sport\Sport');
    Route::apiResource('court', 'Court\Court');
    Route::apiResource('sparring', 'Sparring\Sparring');
    Route::apiResource('comment', 'Comment\Comment');
    Route::apiResource('friend', 'Friend\Friend');
    Route::apiResource('schedule', 'Schedule\Schedule');
    Route::apiResource('sparringparticipant', 'SparringParticipant\SparringParticipant');
});
