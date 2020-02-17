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

Route::get('/days_between', 'DaysBetweenController');

Route::get('/week_days_between', 'WeekDaysBetweenController');

Route::get('/complete_weeks_between', 'CompleteWeeksBetweenController');

