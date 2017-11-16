@extends('layouts.container')
<!--  -->
@section('Header')
<!--  -->
@parent
<!-- Aqui agregar todo el css y js  adicional que se requiera -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="{{ asset('../public/css/sidebar_liquidacion_gris.css') }}">
<!-- Azul o negro-->
<!--
 
    <script src="{{ asset('../public/js/liquidacion.js')}}"></script>  NeverMInd
-->

@endsection @section('panel')
<!--  -->
@endsection @section('navbar')
<!--  -->
@endsection @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 cold-xs-1" id="sidebar">
            <div class="list-group panel ">
                <ul class="list-unstyled components">
                    <li>
                        <a href="#">Planilla de liquidacion</a>
                    </li>
                    <li>
                        <a href="#">Agregar Empleado</a>
                    </li>

                    <li>
                        <a href="{{route('liquidaciones/licencias')}}">Licencias</a>
                    </li>

                    <li>
                        <a href="#">AFP</a>
                    </li>
                    <li>
                        <a href="#">IPS</a>
                    </li>
                    <li>
                        <a href="#">Contacto</a>
                    </li>
                    <li>
                        <a href="#">Impuesto a la renta</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9 cold-xs-11" id="contenedor_licencia">
            @if(session()->has('Error'))
            <div class="alert alert-danger">{{ session('Error') }}</div>
            @endif
            <div id="Tabs" class="container-fluid">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container-fluid">
                        <table class="table table-striped table-bordered table-condensed">
                            <h3 id="tCso">Licencias</h3>	
                            <th>Rut del Empleado</th>
                            <th>Descuenta</th>
                            <th>Duración</th>
                            <th>Fecha de Inicio de licencia</th>
                            <th>Fecha de Termino de licencia</th>
                            {{Busqueda_personal::MostrarLicencias()}}
                        </table>
                    </div>

		        </div>
            </div>
        </div>
    </div>
</div>

@endsection