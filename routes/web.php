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

//首页
Route::get('/','IndexsController@index')->name('index');

//帮助
Route::get('help','IndexsController@help')->name('help');

//关于
Route::get('about','IndexsController@about')->name('about');

//注册和用户操作路由
Route::resource('users','UsersController');

//登录
Route::get('login','LoginsController@create')->name('login');
Route::post('login','LoginsController@store')->name('login');
Route::delete('logout','LoginsController@destroy')->name('logout');
