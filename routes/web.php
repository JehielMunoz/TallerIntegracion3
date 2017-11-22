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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/liquidaciones','HomeController@liquidaciones');
Route::get('liquidaciones/licencias', ['as' => 'liquidaciones/licencias', 'uses'=>'HomeController@liquidaciones_licencias']); // BuscarPersonal Autocompletado
Route::get('liquidaciones/afp', ['as' => 'liquidaciones/afp', 'uses'=>'HomeController@liquidaciones_afp']); // BuscarPersonal Autocompletado
Route::get('liquidaciones/ips', ['as' => 'liquidaciones/ips', 'uses'=>'HomeController@liquidaciones_ips']); // BuscarPersonal Autocompletado
Route::get('liquidaciones/contacto', ['as' => 'liquidaciones/contacto', 'uses'=>'HomeController@liquidaciones_contacto']); // BuscarPersonal Autocompletado




Route::get('/inventario','HomeController@inventario');
Route::get('/inventario/agregar','HomeController@inventario_agregar');
Route::get('/inventario/modificar','HomeController@inventario_modificar');

Route::get('/matriculas','HomeController@matriculas');
Route::get('/recursos-humanos','HomeController@recursos_humanos');
Route::get('/notas','HomeController@notas');
Route::get('/formulario_matricula','HomeController@formulario_matricula');
Route::get('prueba','HomeController@prueba');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*
    Liquidaciones de sueldo 
*/
Route::get('autocompletar', ['as' => 'autocompletar', 'uses'=>'Busqueda_personal@Autocompletar']); // BuscarPersonal Autocompletado
Route::post('BuscarEmpleado',['as'=> 'BuscarEmpleado', 'uses'=>'Busqueda_personal@CargarEmpleado']); // Carga datos del empleado cargado
Route::get('BorrarDato',['as'=> 'BorrarDatos', 'uses'=>'Busqueda_personal@BorrarDatos']); // Maneja cuando se borra una gratificacion o descuento entre otras cosas
Route::get('AgregarDato',['as'=> 'AgregarDato', 'uses'=>'Busqueda_personal@AgregarDatos']); // Maneja cuando se agrega una gratificacion o descuento entre otras cosas
Route::get('ModificarDato',['as'=> 'ModificarDatos', 'uses'=>'Busqueda_personal@ModificarDatos']); // Maneja cuando se agrega una gratificacion o descuento entre otras cosas

Route::post('agregar_item',['as'=> 'agregar_item', 'uses'=>'controller_inventario@agregar_item']);
Route::post('modificar_item',['as'=> 'modificar_item', 'uses'=>'controller_inventario@modificar_item']);