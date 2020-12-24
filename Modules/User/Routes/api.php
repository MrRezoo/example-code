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



Route::group(['prefix' => 'user'], function () {
    Route::post('register','AuthController@register')->name('user.register')->middleware('to_fa_numbers');
    Route::post('login','AuthController@login')->name('user.login')->middleware(['to_fa_numbers','throttle:30,1']);
});
