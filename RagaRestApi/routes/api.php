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

// Route::middleware('auth:api')->get("{{url('/user')}}", function (Request $request) {
//     return $request->user();
// });

/*
Route::get('account','Account\AuthController@account');
Route::get('account/{id}','Account\AccountController@accountByID');
Route::post('account','Account\AccountController@accountSave');
Route::put('account/{id}','Account\AccountController@accountUpdate');
Route::delete('account/{id}','Account\AccountController@accountDelete');
*/
Route::post('login', 'Auth\AuthController@login')->middleware('cors');
Route::post('register', 'Auth\AuthController@register')->middleware('cors');
Route::apiResource('account', 'Account\Account')->middleware('cors');
Route::apiResource('sport', 'Sport\Sport')->middleware('cors');
Route::apiResource('court', 'Court\Court')->middleware('cors');
Route::apiResource('sparring', 'Sparring\Sparring')->middleware('cors');
Route::apiResource('comment', 'Comment\Comment')->middleware('cors');
Route::apiResource('friend', 'Friend\Friend')->middleware('cors');
Route::apiResource('schedule', 'Schedule\Schedule')->middleware('cors');
Route::apiResource('sparringparticipant', 'SparringParticipant\SparringParticipant')->middleware('cors');
Route::get('file/photo_list','FileController@photoList')->middleware('cors');;
Route::post('file/photo_list','FileController@photoSave')->middleware('cors');;