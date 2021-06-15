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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', '\App\Http\Controllers\API\V1\Auth\AuthApiController@login');
Route::middleware('auth:api')->post('logout', '\App\Http\Controllers\API\V1\Auth\AuthApiController@logout');

Route::post('messages', '\App\Http\Controllers\API\V1\Chat\MessageController@message');
