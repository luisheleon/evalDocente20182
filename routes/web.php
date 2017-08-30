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

Route::group(['prefix'=>'admin','middleware'=>'auth'],function () {

    /*
     * Factores
     * */
    Route::resource('factor','FactorController');

    Route::post('factor/FactorView',[
       'as'     =>  'factor.factorView',
       'uses'   =>  'FactorController@factorView'
    ]);

    Route::post('factor/msnFactor',[
        'as'     =>  'factor.factorMsn',
        'uses'   =>  'FactorController@msnError'
    ]);

    /*
     * Criterios
     * */
    Route::resource('criterio','CriterioController');

    Route::post('criterio/CriterioView',[
        'as'     =>  'criterio.criterioView',
        'uses'   =>  'CriterioController@criterioView'
    ]);

    Route::post('criterio/msnCriterio',[
        'as'     =>  'criterio.criterioMsn',
        'uses'   =>  'CriterioController@msnError'
    ]);

});




