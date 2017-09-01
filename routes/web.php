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

    /*
     * Indicador
     * */

    Route::resource('indicador','IndicadorController');

    Route::post('indicador/IndicadorView',[
        'as'     =>  'indicador.indicadorView',
        'uses'   =>  'IndicadorController@indicadorView'
    ]);

    Route::post('indicador/msnIndicador',[
        'as'     =>  'indicador.indicadorMsn',
        'uses'   =>  'indicadorController@msnError'
    ]);

    /*
     * Pregunta
     * */

    Route::resource('pregunta','PreguntaController');

    Route::post('pregunta/PreguntaView',[
        'as'     =>  'pregunta.preguntaView',
        'uses'   =>  'PreguntaController@preguntaView'
    ]);

    Route::post('pregunta/msnPregunta',[
        'as'     =>  'pregunta.preguntaMsn',
        'uses'   =>  'PreguntaController@msnError'
    ]);

    /*
     * Politica
     * */

    Route::resource('politica','PoliticaController');
    Route::post('politica/PoliticaView',[
        'as'     =>  'politica.politicaView',
        'uses'   =>  'PoliticaController@politicaView'
    ]);

    Route::post('politica/msnPregunta',[
        'as'     =>  'politica.politicaMsn',
        'uses'   =>  'PoliticaController@msnError'
    ]);

    /*
     * Politica descripción
     * */
    Route::resource('politicades','PoliticaDesController');
    Route::post('politicades.politicaDesView',[
        'as'     =>  'politicades.politicaDesView',
        'uses'   =>  'PoliticaDesController@politicaDesView'
    ]);

    Route::post('politicaDes/msnPregunta',[
        'as'     =>  'politicades.politicaDesMsn',
        'uses'   =>  'PoliticaDesController@msnError'
    ]);
});




