<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('','HashtagController@show');
Route::post('','HashtagController@store');

Route::post('removehashtag/{id}','HashtagController@destroy');

Route::get('addhashtag','AddhashtagController@index');
Route::post('addhashtag','AddhashtagController@addtag');

Route::get('showcharts','HashtagController@showcharts');
Route::post('showcharts','HashtagController@datacharts');

Route::get('showtop','HashtagController@topRTweets');
