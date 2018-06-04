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
Route::auth();
Route::get('/', function () {
    return view('auth/login');
});



//rutas accessibles solo para el usuario administrador

Route::group(['middleware' => 'auth'], function () {
      
Route::resource('inicio/inicio', 'InicioController'); 
//ALMACEN 
Route::resource('insumo/insumo', 'InsumoController');
Route::resource('insumo/proveedor', 'ProveedorController');
Route::resource('insumo/ingreso', 'IngresoController');

//TURNOS
Route::resource('turno/pdf','PdfturnoController'); 

Route::resource('turno/pdfgeneral','PdfturnosController'); 
Route::resource('turno/turno/destroy','TurnoeditController');

 
Route::resource('estadisticas_turnos','EstadisticasTurnosController');
Route::get('/buscarHorario','TurnoController2@buscarHorario');
Route::get('/buscarSaldo','TurnoController2@buscarSaldo');
Route::get('/buscarAlerta','TurnoController2@buscarAlerta');
Route::get('/buscarStock','TurnoController2@buscarStock');
Route::resource('turno/turno', 'TurnoController2');

//MECANICO
Route::resource('mecanico/mecanico', 'MecanicoController');
Route::resource('mecanico/pedido', 'PedidoController');
Route::resource('mecanico/pieza', 'PiezasController');

//PACIENTE
Route::resource('paciente/paciente', 'PacienteController');
Route::resource('paciente/obrasocial', 'ObrasocialController');

//PROFESIONAL
Route::resource('profesional/consultorio', 'ConsultorioController');
Route::resource('profesional/profesional', 'ProfesionalController');
Route::resource('profesional/liquidacion', 'PreliquidacionController');
Route::resource('profesional/prestacion', 'PrestacionController');
Route::resource('liquidacion/liquidacion', 'LiquidacionController');

//OBRA SOCIAL
Route::resource('liquidacion/pdfliquidaciones', 'PdfliquidacionesController');
Route::resource('prestaciones/prestaciones', 'PrestacionObrasocialController');


Route::resource('auditoria/auditoria', 'AuditoriaController');
Route::resource('seguridad/usuario', 'UsuarioController');
Route::get('events', 'EventController@index');
Route::get('/buscarProvincia','PacienteController@buscarProvincia');
Route::get('/buscarCiudad','PacienteController@buscarCiudad');
Route::resource('transaccion/transaccion','TransaccionController');
Route::resource('pdf','PdfController'); 


});





Route::get('usuario/{id}','UsuarioController@update');

Route::get('error', function(){ 
    abort(500);
});


Route::get('/home', 'HomeController@index');
