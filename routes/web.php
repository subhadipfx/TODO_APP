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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/todo/add', 'HomeController@store');
Route::get('/todo/edit/{id}', 'HomeController@edit');
Route::get('/todo/update/{id}', 'HomeController@update');
Route::get('/todo/delete/{id}', 'HomeController@destroy');
