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
Route::prefix("v1")->group(function(){
    Route::post('/register', 'Api\AuthController@register');
    Route::post('/login', 'Api\AuthController@login');
});

Route::middleware('auth:api')->prefix("v1")->group(function(){
    Route::get('/workout', 'Api\WorkoutController@index');
    Route::post('/workout', 'Api\WorkoutController@store');
    Route::get('/workout_template', 'Api\WorkoutController@templateIndex');
    Route::post('/workout/{id}/exercise_group', 'Api\ExerciseGroupController@store');
    Route::get('/exercise', 'Api\ExerciseController@index');
    Route::post('/exercise', 'Api\ExerciseController@store');
    Route::get('/user', function (Request $request) {
        return Auth::user();
    });
});