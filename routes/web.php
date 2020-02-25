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

//Aula

Route::post('IngresarAula','AulaController@IngresarA')->name('IngresarA');

Route::get('IngresarAula','AulaController@index')->name('AulaI');

//Login

Route::get('/','Auth\LoginController@ShowLoginForm')->name('ShowLoginForm');

Route::post('login','Auth\LoginController@login')->name('login');

Route::get('Docente','DocenteController@indexD')->name('indexD');

Route::post('logout','Auth\LoginController@logout')->name('logout');


//Administrador

Route::get('Administrador','AdministradorController@indexA')->name('indexA');

Route::get('RegistrarD','AdministradorController@RegistrarD')->name('RegistrarD');

Route::post('Administrador','AdministradorController@IngresarD')->name('IngresarD');

Route::post('FiltrarDoc','AdministradorController@FiltrarDoc')->name('FiltrarDoc');

Route::get('Asignar2','AdministradorController@AsignarCu')->name('Asignar2');

Route::post('AsignarCuentadante','AdministradorController@Asignar2')->name('AsignarCuentadante');

Route::get('ActualizarD','AdministradorController@ActualizarD')->name('ActualizarD');

Route::post('ActualizarDoc','AdministradorController@ActualizarDoc')->name('ActualizarDoc');

Route::get('TodosD','AdministradorController@TodosD')->name('TodosD');

Route::get('EditarDoc/{id}','AdministradorController@EditarDoc')->name('EditarDoc');

//Cambios

Route::get('Mis_Cambios', 'CambiosController@cambios')->name('Dcambios');

//Aula

Route::get('AulasElementos/{aula}','AulaController@AulasElementos')->name('AulasElementos');

Route::get('Asignar','AulaController@Asignar')->name('Asignar');

Route::post('AsignarAula','AulaController@AsignarDoc')->name('AsignarAula');

Route::get('ConsultarA','AulaController@ConsultarAulas')->name('ConsultarAulas');

//Elemento

Route::get('ConsultarElementos','ElementoController@ConsultarElementos')->name('ConsultarElementos');

Route::get('IngresarElemento','ElementoController@IngresarElemento')->name('IngresarElemento');

Route::post('IngresarElemento2','ElementoController@IngresarElemento2')->name('IngresarElemento2');


Route::get('QuitarElementos2','ElementoController@QuitarElementos2')->name('QuitarElementos2');

Route::get('QuitarElementos/{aula}','ElementoController@QuitarElementos')->name('QuitarElementos');

Route::post('QuitarElementos3','ElementoController@QuitarElementos3')->name('QuitarElementos3');

//Novedad

Route::get('IngresarNovedad','NovedadController@IngresarNovedad')->name('IngresarNovedad');

Route::post('IngresarNovedad2','NovedadController@IngresarNovedad2')->name('IngresarNovedad2');

Route::get('SeleccionarArea/{area}','NovedadController@SeleccionarArea')->name('SeleccionarArea');

Route::get('IngresarNovedad3','NovedadController@IngresarNovedad3')->name('IngresarNovedad3');

Route::post('IngresarNovedad4','NovedadController@IngresarNovedad4')->name('IngresarNovedad4');

Route::get('ConsultarNovedades','NovedadController@ConsultarNovedades')->name('ConsultarNovedades');

Route::get('ConsultarNovedades2','NovedadController@ConsultarNovedades2')->name('ConsultarNovedades2');