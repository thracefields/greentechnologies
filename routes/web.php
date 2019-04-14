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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/stations', 'StationController');

Route::get('/indicators/{station_id}/today', 'IndicatorController@index')->name('indicators.index');
Route::get('/indicators/{station_id}/{date}', 'IndicatorController@sort')->name('indicators.sort');
Route::resource('/indicators', 'IndicatorController')->except(['index']);
