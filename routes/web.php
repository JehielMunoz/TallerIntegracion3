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
Route::get('/liquidaciones/agregar','HomeController@liquidaciones_agregar');
Route::get('/matriculas','HomeController@matriculas');
Route::get('/matriculas/agregar','HomeController@matriculas_agregar');
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
Route::post('agregar_empleado',['as'=> 'agregar_empleado', 'uses'=>'Busqueda_personal@agregar_empleado']);



Route::get('autocompletar_alumno', ['as' => 'autocompletar_alumno', 'uses'=>'Busqueda_estudiante@Autocompletar']); 
Route::post('BuscarAlumno',['as'=> 'BuscarAlumno', 'uses'=>'Busqueda_estudiante@CargarAlumno']);
Route::post('agregar_alumno',['as'=> 'agregar_alumno', 'uses'=>'Busqueda_estudiante@agregar_alumno']);
Route::get('ModificarDatosAlumno',['as'=> 'ModificarDatosAlumno', 'uses'=>'Busqueda_estudiante@ModificarDatos']);

