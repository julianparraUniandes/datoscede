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

Route::prefix('admin')->group(function(){

    Route::resource('/temas', 'TemaController');
    Route::resource('/metadata', 'MetadataController');
    Route::resource('/profesor', 'ProfesorController');
    Route::resource('/sala', 'SalaController');
    Route::resource('/menu', 'MenuController');
    Route::resource('/descarga', 'DescargaController');
    Route::resource('/rede', 'RedeController');
    Route::resource('/autorization', 'AutorizationController');
    Route::resource('/usuario', 'UsuarioController');
    Route::resource('/parametros', 'ParametroController');
    Route::resource('/inconsistencia', 'InconsistenciaController');
    /**
     *  Microdata
     */
    Route::get('/microdata/meta={id_meta}', 'MicrodataController@createMicro')->name('microdata.createMicro');
    Route::post('/microdata/meta={id_meta}', 'MicrodataController@storeMicro')->name('microdata.storeMicro');
    Route::post('/microdata/meta={id_meta}/eliminar/{id_micro}', 'MicrodataController@destroyMicro')->name('microdata.destroyMicro');
    /**
     *  Material Relacionado
     */
    Route::get('/material/meta={id_meta}', 'MaterialController@createMate')->name('material.createMate');
    Route::post('/material/meta={id_meta}', 'MaterialController@storeMate')->name('material.storeMate');
    Route::post('/material/meta={id_meta}/eliminar/{id_mate}', 'MaterialController@destroyMate')->name('material.destroyMate');
    /**
     *  Publicaciones
     */
    Route::get('/publicacion/meta={id_meta}', 'PublicacionController@createPubli')->name('publicacion.createPubli');
    Route::post('/publicacion/meta={id_meta}', 'PublicacionController@storePubli')->name('publicacion.storePubli');
    Route::post('/publicacion/meta={id_meta}/eliminar/{id_publi}', 'PublicacionController@destroyPubli')->name('publicacion.destroyPubli');

    //Excel
    Route::get('/export/descargas/', 'DescargaController@export')->name('exporta.descarga');

});

Route::get('lang/{locale}', 'LocalizationController@index')->name('idioma');
Route::get('/', 'WebController@index')->name('index');
Route::get('/catalogo', 'BusquedaController@busqueda');
Route::get('/catalogo/{letra}', 'BusquedaController@letra')->name('catalogo.letra');
Route::get('/catalogo/temas/{tema}', 'WebController@catalogoPorTema')->name('catalogo.tema');
Route::get('metadatos/{slug}/{id}', 'WebController@metadatoDetalle')->name('metadata.show');
Route::post('/actualizaDatos', 'WebController@updateUserData')->name('complete.data');
Route::post('/motivoDescarga', 'DescargaController@nuevaDescarga')->name('complete.motivation');
Route::post('/solicitudProfesor', 'AutorizationController@nuevaSolicitudProfesor')->name('auth.profesor');
Route::post('/solicitudAdmin', 'AutorizationController@nuevaSolicitudAdmin')->name('auth.admin');
Route::post('/reporteInconsistencia', 'InconsistenciaController@nuevaInconsistencia')->name('complete.incon');
Route::get('/sala', 'WebController@sala');
//Autorizaciones
Route::get('aljtes_hyttkbnertaa_feess/{uuid}/{user_id}', 'AutorizationController@autorizaSolicitud');
Route::get('dljtes_hyttkbnertdd_feess/{uuid}/{user_id}', 'AutorizationController@niegaSolicitud');
//Búsqueda

Route::get('/catalogo/{search}', 'BusquedaController@busqueda')->name('catalogo.busqueda');
Route::get('autocomplete', 'BusquedaController@autocomplete')->name('autocomplete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Azure
Route::get('login/azure', 'Auth\LoginController@redirectToProvider')->name('azure.login');
Route::get('login/azure/callback', 'Auth\LoginController@handleProviderCallback');

//Excel
Route::get('metadata/export/', 'MetadataController@export')->name('exporta.metadata');


