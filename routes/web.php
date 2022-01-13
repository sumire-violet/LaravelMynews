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
Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create'); #22章追記
    Route::get('profile/create','Admin\ProfileController@add');
    Route::post('plofile/create','Admin\ProfileController@create'); #22章追記
    Route::get('profile/edit','Admin\ProfileController@edit');
    Route::post('profile/edit','Admin\ProfileController@update'); #22章追
    Route::get('news', 'Admin\NewsController@index'); // 追記
    Route::get('profile','Admin\ProfileController@index'); //26章追記
    Route::get('profile/delete','Admin\ProfileController@delete');//26章追記
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth'); // 26章追記
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth'); // 26章追記
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');//26章追記
});

Route::get('/XXX','Admin\AAAController@bbb');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'NewsController@index');//29章追記
Route::get('/profile','ProfileController@index');//29章追記
