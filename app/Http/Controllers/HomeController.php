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
    public function liquidaciones_licencias()
    {
        return view('modules.liquidaciones.licencias');
    }
    public function liquidaciones_afp()
    {
        return view('modules.liquidaciones.afp');
    }
    public function liquidaciones_ips()
    {
        return view('modules.liquidaciones.ips');
    }
    public function liquidaciones_contacto()
    {
        return view('modules.liquidaciones.contacto');
    }
    public function matriculas()
    {
        return view('modules.matriculas');
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
