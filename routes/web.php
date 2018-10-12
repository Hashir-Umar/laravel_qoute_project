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

Route::get('/{author_name?}', [
    'uses' => 'QouteController@getIndex',
    'as' => 'index'
]);

Route::post('/new', [
    'uses' => 'QouteController@postQoute',
    'as' => 'create'
]);

Route::get('/delete/{qoute_id}', [
    'uses' => 'QouteController@deletePost',
    'as' => 'delete'
]);
