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

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    //Laravel 15で追加
    Route::get('news', 'Admin\NewsController@index')->middleware('auth');
    //Laravel 16で追加
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth');
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');
    //Laravel 16でさらに追加
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
});
//laravel 13 課題
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
