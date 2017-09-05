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

Route::get('liquidaciones', function(){
    return view('liquidaciones');
});

// Prueba controlador

Route::get('prueba', function(){
    $persona = DB::table('tEmpleados')->where('Rut',"=","136287826")->get();
    return $persona[0]->Sueldo_base;
});
    


