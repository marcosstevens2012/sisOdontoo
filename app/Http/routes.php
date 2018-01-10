<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('turno/turno', 'TurnoController');
Route::auth();
Route::resource('insumo/insumo', 'InsumoController');
Route::resource('mecanico/pieza', 'PiezasController');
Route::resource('inicio/inicio', 'InicioController');
Route::resource('paciente/paciente', 'PacienteController');
Route::resource('insumo/ingreso', 'IngresoController');
Route::resource('seguridad/usuario', 'UsuarioController');
Route::resource('insumo/proveedor', 'ProveedorController');
Route::resource('paciente/odontograma', 'OdontogramaController');
Route::resource('prestaciones/prestaciones', 'PrestacionProfesionalController');
Route::resource('profesional/consultorio', 'ConsultorioController');
Route::resource('profesional/profesional', 'ProfesionalController');
Route::resource('paciente/obrasocial', 'ObrasocialController');
Route::resource('profesional/prestacion', 'PrestacionController');
Route::resource('mecanico/mecanico', 'MecanicoController');
Route::get('/buscarProvincia','PacienteController@buscarProvincia');
Route::get('/buscarCiudad','PacienteController@buscarCiudad');
Route::resource('transaccion/transaccion','TransaccionController');
Route::resource('estadisticas_turnos','EstadisticasTurnosController');
Route::resource('pdf','PdfController'); 

Route::get('usuario/{id}','UsuarioController@update');

Route::get('error', function(){ 
    abort(500);
});


Route::get('/home', 'HomeController@index');
