<!-- Stored in resources/views/child.blade.php -->
<?php use App\Http\Controllers\Busqueda_personal; ?>
@extends('modules.pruebaParent')

@section('title', 'Page Title')

@section('sidebar')
    <!--@parent -->

    <p>Este es el nuevo mensaje agrado al padre sidebar, however va a ser mostrado solo </p>
    <p>
    	 {{Busqueda_personal::cal_Total_Imponible()}}
    	 {{session('Empleado')->Datos->Total_Haberes}}
    </p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection