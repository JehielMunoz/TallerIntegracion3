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
        public function inventario()
    {
        return view('modules.inventario');
    }
    	public function inventario_agregar()
    {
        return view('modules.inventario.agregar_item');
    }
	public function inventario_modificar() 
    { 
        return view('modules.inventario.modificar_item'); 
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
