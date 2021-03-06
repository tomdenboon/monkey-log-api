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
    Route::put('/workout/{id}', 'Api\WorkoutController@update');
    Route::get('/workout/{id}', 'Api\WorkoutController@show');
    Route::delete('/workout/{id}', 'Api\WorkoutController@destroy');

    Route::get('/template', 'Api\TemplateController@index');
    Route::get('/template/{id}', 'Api\TemplateController@show');
    Route::post('/template', 'Api\TemplateController@store');
    Route::post('/workout/{id}/to-template', 'Api\TemplateController@clone');

    Route::get('/active', 'Api\ActiveController@get');
    Route::post('/active/start_empty', 'Api\ActiveController@startEmpty');
    Route::post('/template/{id}/start', 'Api\ActiveController@start');

    Route::get('/complete', 'Api\CompleteController@index');
    Route::get('/complete/{id}', 'Api\CompleteController@show');
    Route::post('/active/complete', 'Api\CompleteController@complete');

    Route::get('/workout/{id}/exercise_group', 'Api\ExerciseGroupController@index');
    Route::post('/workout/{id}/exercise_group', 'Api\ExerciseGroupController@store');
    Route::delete('/exercise_group/{id}', 'Api\ExerciseGroupController@destroy');

    Route::post('/exercise_group/{id}/copy_last_row', 'Api\ExerciseRowController@copyLastRow');
    Route::put('/exercise_row/{id}', 'Api\ExerciseRowController@update');
    Route::delete('/exercise_row/{id}', 'Api\ExerciseRowController@destroy');

    Route::get('/exercise', 'Api\ExerciseController@index');
    Route::post('/exercise', 'Api\ExerciseController@store');
    Route::get('/exercise/{id}', 'Api\ExerciseController@show');
    Route::put('/exercise/{id}', 'Api\ExerciseController@update');
    Route::delete('/exercise/{id}', 'Api\ExerciseController@destroy');

    Route::get('/exercise_type', 'Api\ExerciseTypeController@index');
    
    Route::get('/statistic/general', 'Api\StatisticController@general');

    Route::get('/user', function (Request $request) {
        return Auth::user();
    });
});