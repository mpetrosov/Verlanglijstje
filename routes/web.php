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

Route::group(['middleware' => ['web']], function () {

    Route::get('/','VerlanglijstjeController@index')->name('home');
    
    Route::resource('/verlanglijstjes', 'VerlanglijstjeController');

    Route::get('/item/get/{slug}', 'ItemController@getItems');
    
    Route::resource('/item', 'ItemController');
    
    Route::get('/{slug}', 'PageController@getSharedList')->name('shortURL');

});

Auth::routes();



