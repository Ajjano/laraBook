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


Route::get('/', 'SiteController@index');
Route::resource('topics', 'TopicController');
Route::resource('blocks','BlockController');
Route::get('/{category}','SiteController@index_category')->name('index_cats');