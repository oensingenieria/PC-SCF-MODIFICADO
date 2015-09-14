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

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::get('pc/trabajabilidad_flujo', 'EnsayoTrabajabilidadController@trabajabilidad_flujo');
Route::post('pc/trabajabilidad_flujo', 'EnsayoTrabajabilidadController@post_trabajabilidad_flujo');
Route::post('pc/trabajabilidad_flujo/carga', 'EnsayoTrabajabilidadController@consulta_trabajabilidad_carga');
Route::post('pc/trabajabilidad_flujo/codigo', 'EnsayoTrabajabilidadController@consulta_trabajabilidad_codigo');
Route::post('pc/trabajabilidad_flujo/fecha', 'EnsayoTrabajabilidadController@consulta_trabajabilidad_fecha');
Route::post('pc/trabajabilidad_flujo/carga/historial', 'EnsayoTrabajabilidadController@consulta_trabajabilidad_carga_historial');
Route::post('pc/trabajabilidad_flujo/fecha/historial', 'EnsayoTrabajabilidadController@consulta_trabajabilidad_fecha_historial');
Route::post('pc/trabajabilidad_flujo/fecha_rango/historial', 'EnsayoTrabajabilidadController@consulta_trabajabilidad_fecha_historial_rango');
//Redirecting
Route::get('pc/trabajabilidad_flujo/save/{fecha}', 'EnsayoTrabajabilidadController@redirect_trabajabilidad_flujo');

Route::get('pc/yield', 'EnsayoYieldController@consulta_yield');
Route::post('pc/yield/fecha', 'EnsayoYieldController@consulta_yield_historial_fecha');
Route::post('pc/yield/rango', 'EnsayoYieldController@consulta_yield_historial_rango');
Route::post('pc/yield/carga', 'EnsayoYieldController@consulta_yield_historial_carga');
Route::post('/pc/yield/crear', 'EnsayoYieldController@yield_post');
Route::post('/pc/yield/molde', 'EnsayoYieldController@molde_post');
Route::post('/pc/yield/ensayo/carga', 'EnsayoYieldController@consulta_yield_ensayo_carga');
//Redirecting
Route::get('pc/yield/historial/{carga}', 'EnsayoYieldController@muestra_historial_yield');



Route::get('pc/vebe', 'EnsayoVebeController@vebe');
Route::post('pc/vebe', 'EnsayoVebeController@post_vebe');
Route::post('pc/vebe/fecha', 'EnsayoVebeController@vebe_busqueda_fecha');
Route::post('pc/vebe/fecha/historial', 'EnsayoVebeController@vebe_busqueda_fecha_historial');
Route::post('pc/vebe/carga/historial', 'EnsayoVebeController@vebe_busqueda_carga_historial');
Route::post('pc/vebe/rango/historial', 'EnsayoVebeController@vebe_busqueda_rango_historial');
//Redirecting
Route::get('pc/yield/save/{fecha}', 'EnsayoVebeController@redirect_vebe');



Route::get('pc/falla7', 'EnsayoFalla7Controller@falla7');
Route::post('pc/falla7/fecha', 'EnsayoFalla7Controller@falla7_busqueda_fecha');
Route::post('pc/falla7', 'EnsayoFalla7Controller@post_falla7');
Route::post('pc/falla7/fecha/historial', 'EnsayoFalla7Controller@falla7_historial_busqueda_fecha');
Route::post('pc/falla7/carga/historial', 'EnsayoFalla7Controller@falla7_historial_busqueda_carga');
Route::post('pc/falla7/rango/historial', 'EnsayoFalla7Controller@falla7_historial_busqueda_rango');
//Redirecting
Route::get('pc/falla7/save/{fecha}', 'EnsayoFalla7Controller@redirect_falla7');


Route::get('pc/falla28', 'EnsayoFalla28Controller@falla28');
Route::post('pc/falla28/fecha', 'EnsayoFalla28Controller@falla28_busqueda_fecha');
Route::post('pc/falla28', 'EnsayoFalla28Controller@post_falla28');
Route::post('pc/falla28/fecha/historial', 'EnsayoFalla28Controller@falla28_historial_busqueda_fecha');
Route::post('pc/falla28/carga/historial', 'EnsayoFalla28Controller@falla28_historial_busqueda_carga');
Route::post('pc/falla28/rango/historial', 'EnsayoFalla28Controller@falla28_historial_busqueda_rango');
//Redirecting
Route::get('pc/falla28/save/{fecha}', 'EnsayoFalla28Controller@redirect_falla28');



Route::get('pc/transferencias', 'EnsayoTransferenciaController@transferencias');
Route::post('pc/transferencias/fecha', 'EnsayoTransferenciaController@transferencias_busqueda_fecha');
Route::post('pc/transferencias', 'EnsayoTransferenciaController@post_transferencias');
Route::post('pc/transferencias/fecha/historial', 'EnsayoTransferenciaController@transferencia_historial_busqueda_fecha');
Route::post('pc/transferencias/carga/historial', 'EnsayoTransferenciaController@transferencia_historial_busqueda_carga');
Route::post('pc/transferencias/rango/historial', 'EnsayoTransferenciaController@transferencia_historial_busqueda_rango');
//Redirecting
Route::get('pc/transferencias/save/{fecha}', 'EnsayoTransferenciaController@redirect_transferencia');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('/pc/getdata/excel/loadmixer', 'excelController@get_data');