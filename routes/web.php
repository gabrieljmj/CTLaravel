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

Route::get('/', 'AppController@index')->name('home');

Route::prefix('/people/')->group(function () {
    Route::get('/new', 'AppController@create')->name('person.create');
    Route::get('/update/{id}', 'AppController@update')->name('person.update');
});
