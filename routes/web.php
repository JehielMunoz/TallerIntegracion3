<?php

Route::get('/', function () {
    return view('welcome');
});



// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');	



Route::get('/home', 'HomeController@index')->name('home');






















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
