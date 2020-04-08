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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware'=>'web'],function(){
    Route::any('login','Admin\LoginController@index');
    Route::get('/', function () {
        session(['admin'=>'111']);
        return view('welcome');
    });

    Route::get('/admin', function () {
        echo session('admin');
    });
    Route::get('/laptop-sales', function () {
    	echo 'laptop sales';
	});
});

Route::get('/test', function () {
    echo 'test';
});