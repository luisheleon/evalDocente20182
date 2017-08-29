<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/home', 'MenuController@index')->name("menuIndexPrincipal");
Route::get('/minor', 'HomeController@minor')->name("minor");

Auth::routes();

Route::prefix('admin')->group(function () {

    Route::get('factores',[
        'uses'  =>  'FactorController@index',
        'as'    =>  'factores'
    ]);
});




