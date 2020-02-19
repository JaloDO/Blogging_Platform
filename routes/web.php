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

Route::get('/', 'FrontController@index'); //main Frontend
//Route::get('/home', 'FrontController@index');

Auth::routes();

//Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@post')->name('home');
Route::get('/home/profile', 'HomeController@profile');
Route::get('/home/post', 'HomeController@myPost'); //view list

Route::get('/home/post/submit', 'HomeController@store');