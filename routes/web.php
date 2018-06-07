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

Route::get('/home', 'AdminController@index')->name('home');

Route::get('/create-offer', 'AdminController@createOffer')->name('create-offer');
Route::post('/create-offer', 'AdminController@create')->name('create');
Route::get('/delete-offer/{id}', 'AdminController@deleteOffer')->name('delete-offer');
Route::get('/update-offer/{id}', 'AdminController@updateOffer')->name('update-offer');
Route::post('/update-offer/{id}', 'AdminController@update')->name('update');
