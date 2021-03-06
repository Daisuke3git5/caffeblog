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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('caffe/create', 'Admin\CaffeController@add');
     Route::post('caffe/create', 'Admin\CaffeController@create'); 
     Route::get('caffe', 'Admin\CaffeController@index');
     Route::get('caffe/edit', 'Admin\CaffeController@edit'); // 追記
     Route::post('caffe/edit', 'Admin\CaffeController@update'); 
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
