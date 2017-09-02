<?php
//dd(env('APP_VERSION'))
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/',function(){
	return 'hola mundo';
});
//pidiendo parametro 'nombre' y poniendo nombre default
Route::get('usuarios/{nombre?}',function($nombre='Michi'){
	return $nombre;
})->where('nombre','[a-zA-Z]+'); // solo digitos '\d+', cualquier alfanumero y subrayado '\w+'

//aqui van pos delete y mas, distintos verbos http pueden tener la misma uri


Route::get('/', function () {
    return view('welcome');
});

// hacer una peticion al controller HomeController y su metodo
Route::get('/','HomeController@home');

*/


Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');
