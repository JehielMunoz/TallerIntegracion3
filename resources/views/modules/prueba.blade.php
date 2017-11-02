<!-- Stored in resources/views/child.blade.php -->
<?php use App\Http\Controllers\Busqueda_personal; ?>
@extends('modules.pruebaParent')

@section('title', 'Page Title')

@section('sidebar')
    <!--@parent -->

    <p>Este es el nuevo mensaje agrado al padre sidebar, however va a ser mostrado solo </p>
    <p>
    	 {{Busqueda_personal::cal_Total_Descuentos()}}
    	 {{session('Empleado')->Datos->Descuentos_Legal}}
    	 {{session('Empleado')->Datos->Descuentos_Otros}}
    	 {{Busqueda_personal::Liquido_Pagar()}}

    	 <p>oha</p>

    	 {{Busqueda_personal::cal_Descuentos_Varios()}}
    	 {{session('Empleado')->Datos->Total_Descuentos}}

    	 {{Busqueda_personal::Total_AFP()}}
    	 {{session('Empleado')->Datos->Total_AFP}}
    	 {{session('Empleado')->Datos->Descuentos_Legal}}
    	 
    	 
    </p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection