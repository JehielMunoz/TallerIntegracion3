<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.container');
    }

    public function liquidaciones()
    {
        return view('modules.liquidaciones');
    }
    public function liquidaciones_agregar()
    {
        return view('modules.liquidaciones.agregar_empleado');
    }
    public function matriculas()
    {
        return view('modules.matriculas');
    }
    public function matriculas_agregar()
    {
        return view('modules.matriculas.agregar_alumno');
    }
    public function recursos_humanos(){
        return view('modules.recursos_humanos');
    }
    public function notas(){
        return view('modules.notas');
    }
    public function formulario_matricula(){
        return view('contents.formulario_matricula');
    }

    public function prueba(){
        return view('modules.prueba');
    }
}
