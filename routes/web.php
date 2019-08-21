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
Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('quarks', 'QuarkController');

Route::get('user/index', 'UserController@index')->name('user.index');
Route::get('user/edit', 'UserController@edit')->name('user.edit');
Route::put('user/update', 'UserController@update')->name('user.update');

Auth::routes();
