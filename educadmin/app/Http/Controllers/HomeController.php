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
}
