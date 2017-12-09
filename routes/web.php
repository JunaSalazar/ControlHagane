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

Route::get('/logout', 'LoginController@userLogout');


Route::get('/', function(){
	return view('/login');
});

Route::resource('/proyecto/proyecto','ProyectoController');
Route::get('/proyecto', 'ProyectoController@index');
Route::post('/proyecto/store', 'ProyectoController@store');
Route::get('/proyecto/{id}/show', 'ProyectoController@show');
Route::get('/proyecto/{id}', 'ProyectoController@update');
Route::group(['prefix' => ''], function(){Route::resource('proyecto', 'ProyectoController');});

Route::resource('/empresa/empresa','EmpresaController');
Route::group(['prefix' => ''], function(){Route::resource('empresa', 'EmpresaController');});
Route::get('/empresa', 'EmpresaController@index');
Route::post('/empresa/store', 'EmpresaController@store');
Route::get('/empresa/{id}/show', 'EmpresaController@show');
Route::get('/empresa/{id}', 'EmpresaController@update');

Route::resource('/cliente/cliente','ClienteController');
Route::group(['prefix' => ''], function(){Route::resource('cliente', 'ClienteController');});
Route::get('/cliente', 'ClienteController@index');
Route::post('/cliente/store', 'ClienteController@store');
Route::get('/cliente/{id}/show', 'ClienteController@show');
Route::get('/cliente/{id}', 'ClienteController@update');


Route::get('/modulo', 'ModuloController@index');
Route::post('/modulo/store', 'ModuloController@store');


Route::get('/proyecto_cliente', 'ProyectoClienteController@index');

Route::get('/avance',array('as'=>'avance','uses'=>'AvanceController@index'));
Route::get('/avance/ajax/{id}',array('as'=>'avance.ajax','uses'=>'AvanceController@myformAjax'));
Route::get('/avance', 'AvanceController@index');
Route::post('/avance/store', 'AvanceController@store');
Route::get('/avance/{id}/show', 'AvanceController@show');
Route::get('/avance/{id}', 'AvanceController@update');

Route::get('/historial', 'HistorialController@index');
Route::post('/historial/store', 'HistorialController@store');
Route::get('/historial/{id}/show', 'HistorialController@show');
Route::get('/historial/{id}', 'HistorialController@update');
Route::get('/historial',array('as'=>'historial','uses'=>'HistorialController@index'));



Route::get('/recordatorio', function () {
    return view('recordatorio/recordatorio');
});

Route::get('/time', function () {
    return view('timepicker');
});


Route::get('/progreso', function () {
    return view('progreso/progreso');
});

Route::resource('/empleado/empleado','EmpleadoController');
Route::group(['prefix' => ''], function(){Route::resource('empleado', 'EmpleadoController');});
Route::get('/empleado', 'EmpleadoController@index');
Route::post('/empleado/store', 'EmpleadoController@store');
Route::get('/empleado/{id}/show', 'EmpleadoController@show');
Route::get('/empleado/{id}', 'EmpleadoController@update');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
