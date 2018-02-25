<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('person/')->group(function () {
    Route::prefix('get/')->group(function () {
        Route::get('/{id?}', 'Person\\PersonApiController@read')
            ->where('id', '[0-9]+')
            ->name('person.api.read.all');
        Route::get('/fisical', 'Person\\PersonApiController@readFisical')->name('person.api.read.fisical');
        Route::get('/legal', 'Person\\PersonApiController@readLegal')->name('person.api.read.legal');
    });

    Route::put('/create', 'Person\\PersonApiController@create')->name('person.api.create');
    Route::post('/update', 'Person\\PersonApiController@update')->name('person.api.update');
    Route::delete('/delete', 'Person\\PersonApiController@delete')->name('person.api.delete');
});
