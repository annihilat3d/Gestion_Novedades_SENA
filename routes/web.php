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

//EJEMPLOS

Route::get('fotos', function () {
    return 'Estas en la galeria de fotos';
});

// Ruta con variable opcional y con un where utilizado como condicional a numero y returna un texto con el numero ingresado
Route::get('hola/{numero?}', function ($numero = 0) {
    return 'Estas en hola numero : '.$numero ;
})->where('numero','[0-9]+');

//Ruta que retorna vista. indice / vista / variable

Route::view('galeria','fotos', ['numero' => 150]);

//Login

Route::get('/','Auth\LoginController@ShowLoginForm')->name('ShowLoginForm');

Route::post('login','Auth\LoginController@login')->name('login');

Route::get('Docente','DocenteController@indexD')->name('indexD');

Route::post('logout','Auth\LoginController@logout')->name('logout');


//Administrador

Route::get('Administrador','AdministradorController@indexA')->name('indexA');

Route::get('RegistrarD','AdministradorController@RegistrarD')->name('RegistrarD');

Route::post('Administrador','AdministradorController@IngresarD')->name('IngresarD');
//Docente



Route::get('Mis_Cambios/{vida?}', 'CambiosController@cambios')->name('Dcambios');
