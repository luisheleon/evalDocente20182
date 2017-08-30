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

Route::get('/', 'Auth\LoginController@showLoginForm')->name("loginAplicacion");
Route::get('/home', 'MenuController@index')->name("indexHome");
Route::get('/minor', 'HomeController@minor')->name("minor");

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('factores',[
        'uses'  =>  'FactorController@index',
        'as'    =>  'factores'
    ]);

});




