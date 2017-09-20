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
Route::get('/matriculas','HomeController@matriculas');
Route::get('/recursos-humanos','HomeController@recursos_humanos');
Route::get('/notas','HomeController@notas');
Route::get('/formulario_matricula','HomeController@formulario_matricula');
Route::get('prueba','HomeController@prueba');
Route::get('autocompletar', ['as' => 'autocompletar', 'uses'=>'Busqueda_personal@Autocompletar']); // BuscarPersonal Autocompletado

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

