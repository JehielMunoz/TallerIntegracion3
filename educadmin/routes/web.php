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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
