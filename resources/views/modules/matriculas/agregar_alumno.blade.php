@extends('layouts.container')
@section('Header')
<!-- Aqui agregar todo el css y js  adicional que se requiera -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous">




</script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="{{ asset('css/sidebar_liquidacion_gris.css') }}">
<!-- Azul o negro-->
<link rel="stylesheet" href="{{ asset('css/tabs_liquidaciones.css') }}">
@endsection @section('panel')
<!--  -->
@endsection @section('navbar')
<!--  -->
@endsection @section('content')

<div class="container-fluid">
    <div class="row">
        @include('modules.matriculas.menu_matriculas')
        
        <div class="col-md-9 cold-xs-11" id="contenedor_tabs">
            @if(session()->has('Error'))
            <div class="alert alert-danger">{{ session('Error') }}</div>
            @endif
            <div id="Tabs" class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h2 class="page-header">
                            Agregar alumno
                        </h2>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a href="#cDatos_alumno" data-toggle="tab" class="nav-link  active">Datos Alumno</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cApoderado" data-toggle="tab" class="nav-link">Apoderado</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cAnt_familiares" data-toggle="tab" class="nav-link">Datos de familia</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cSalud_alumno" data-toggle="tab" class="nav-link">Salud Alumno</a>
                            </li>
                        </ul>
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="cDatos_alumno">
                                
                                @include('modules/matriculas/agregar/datos_alumno')

                            </div>

                            <div class="tab-pane" id="cApoderado">

                                    @include('modules/matriculas/agregar/apoderado')
                                
                            </div>
                            <div class="tab-pane" id="cAnt_familiares">

                                    @include('modules/matriculas/agregar/ant_familiares')

                            </div>
                            <div class="tab-pane" id="cSalud_alumno">
                                
                                    @include('modules/matriculas/agregar/salud_alumno')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
