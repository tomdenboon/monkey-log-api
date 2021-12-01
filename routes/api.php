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
    Route::get('/workout/{id}', 'Api\WorkoutController@show');
    Route::put('/workout/{id}', 'Api\WorkoutController@update');
    Route::delete('/workout/{id}', 'Api\WorkoutController@destroy');

    Route::get('/template', 'Api\WorkoutController@templateIndex');
    Route::post('/template/{id}/clone', 'Api\WorkoutController@clone');

    Route::delete('/exercise_group/{id}', 'Api\ExerciseGroupController@destroy');
    Route::get('/workout/{id}/exercise_group', 'Api\ExerciseGroupController@index');
    Route::post('/workout/{id}/exercise_group', 'Api\ExerciseGroupController@store');

    Route::put('/weighted_exercise/{id}', 'Api\WeightedExerciseController@update');
    Route::delete('/weighted_exercise/{id}', 'Api\WeightedExerciseController@destroy');
    Route::post('/exercise_group/{id}/weighted_exercise', 'Api\WeightedExerciseController@store');

    Route::get('/exercise', 'Api\ExerciseController@index');
    Route::post('/exercise', 'Api\ExerciseController@store');
    Route::delete('/exercise/{id}', 'Api\ExerciseController@destroy');

    Route::get('/user', function (Request $request) {
        return Auth::user();
    });
});