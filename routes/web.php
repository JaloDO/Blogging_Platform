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
Route::get('/post/{slug}', 'FrontController@showpost'); //show post

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/profile', 'HomeController@profile');
Route::get('/home/post', 'HomeController@post'); //view list
