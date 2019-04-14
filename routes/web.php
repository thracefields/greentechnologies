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
    $articles = Article::orderBy('id', 'desc')->take(10)->get();
    return view('welcome')->withArticles($articles);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/stations', 'StationController');

Route::get('/indicators/{station_id}/today', 'IndicatorController@index')->name('indicators.index');
Route::get('/indicators/{station_id}/{date}', 'IndicatorController@sort')->name('indicators.sort');
Route::resource('/indicators', 'IndicatorController')->except(['index']);

Route::resource('/requirements', 'RequirementController');

// Articles
Route::prefix('blog')->group(function () {
    Route::resource('/articles', 'ArticleController');
});

Route::get('search', 'PagesController@getSearch')->name('search');


