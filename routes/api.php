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

Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

Route::middleware('auth:api')->prefix("v1")->group(function(){
    Route::get('/workout', 'API\WorkoutController@index');
    Route::post('/workout', 'API\WorkoutController@store');
    Route::get('/user', function (Request $request) {
        return Auth::user();
    });
});