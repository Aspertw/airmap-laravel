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

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/datasource', 'HomeController@datasource')->name('datasource');
Route::get('/dialy-gif', 'HomeController@dialyGif')->name('dialy-gif');
Route::get('/recruit', 'HomeController@recruit')->name('recruit');
Route::get('/about', 'HomeController@about')->name('about');

Route::group(['prefix' => 'widget'], function () {
    Route::get('create/{group}${uuid}', 'WidgetV4Controller@create')->name('widget.create');
    Route::get('{type}/{group}${uuid}', 'WidgetV4Controller@show')->name('widget.show');
});


/* JSON */
Route::group(['prefix' => 'json', 'middleware' => 'cors'], function () {
    Route::get('airmap.json', 'JsonController@airmap');
    Route::get('townmap.json', 'JsonController@townmap');
    Route::get('{json}', 'JsonController@group')
        ->where('json', '.*\.json$')->name('json');

    Route::get('query-lastest', 'JsonController@lastest');
    Route::get('query-history', 'JsonController@history');

    Route::get('query-region', 'JsonController@region');
    Route::get('query-bounds', 'JsonController@bounds');
});

// Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


/* v4 */
Route::get('/{latlng?}', 'V4Controller@map')->where('latlng', '@[0-9.]+,[0-9.]+')->name('v4.map');
Route::get('/list', 'V4Controller@list')->name('v4.list');
Route::get('/site', 'V4Controller@site')->name('v4.site');
