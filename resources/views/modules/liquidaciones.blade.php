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
<link rel="stylesheet" href="{{ asset('../public/css/tabs_liquidaciones.css') }}">
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
        $('#nPersonal').on('input', function () {
            var Nombres = [];
            var Rut = [];
            var urlAutocompletar = "{{ route('autocompletar') }}" + "?Nombre_Personal=" + $(this).val(); // limitar caracteres, minimo 3 o 2 

            $.getJSON(urlAutocompletar, function (Personal) {

                for (var x = 0; x < Personal.length; x++) {
                    Nombres.push(Personal[x].Nombre);
                    Rut.push(Personal[x].Rut);
                }
            });

            $(this).autocomplete({
                source: Nombres,
                select: function (event, nombre) {
                    var index_rut = Nombres.indexOf(nombre.item.value);
                    $('#Rut_Personal').val(Rut[index_rut]);
                }
            });

        });
    });
</script>
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
                        <a href="{{ url('/liquidaciones') }}">Planilla de liquidacion</a>
                    </li>
                    <li>
                        <a href="{{ url('/liquidaciones/agregar') }}">Agregar Empleado</a>
                    </li>

                    <li>
                        <a href="#">Licencias</a>
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
        <div class="col-md-9 cold-xs-11" id="contenedor_tabs">
            @if(session()->has('Error'))
            <div class="alert alert-danger">{{ session('Error') }}</div>
            @endif
            @if(session()->has('succ'))
            <div class="alert alert-success">{{ session('succ') }}</div>
            @endif
            <div id="Tabs" class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h2 class="page-header">
                            @if(session()->has('Empleado')) [{{ session('Empleado')->Datos->Nombre}}] @endif
                        </h2>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a href="#cPlanilla" data-toggle="tab" class="nav-link  active">Planilla</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cGratificaciones" data-toggle="tab" class="nav-link">Gratificaciones</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cDescuentos" data-toggle="tab" class="nav-link">Descuentos</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cVistaPrevia" data-toggle="tab" class="nav-link">Vista Previa</a>
                            </li>
                            <li class="nav-item ml-auto  justify-content-end">
                                <form class="form-inline" method="POST" action="{{ route('BuscarEmpleado') }}">
                                    {{ csrf_field() }}
                                    <input class=" form-control mr-sm-2" type="text" name="Nombre_Personal" id="nPersonal" data-action="{{ route('autocompletar') }}"
                                        placeholder="Nombre Empleado">
                                    <input type "text" name="Rut_Personal" id="Rut_Personal" hidden>
                                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </li>
                        </ul>
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="cPlanilla">
                                @if(session()->has('Empleado'))

                                    @include('modules/liquidaciones/planilla')

                                @else
                                    @include('modules/liquidaciones/noEmpleado')
                                
                                @endif
                            </div>

                            <div class="tab-pane" id="cGratificaciones">
                                @if(session()->has('Empleado'))

                                    @include('modules/liquidaciones/gratificaciones')

                                @else
                                    @include('modules/liquidaciones/noEmpleado')
                                
                                @endif
                                
                            </div>
                            <div class="tab-pane" id="cDescuentos">
                                @if(session()->has('Empleado'))

                                    @include('modules/liquidaciones/descuentos')

                                @else
                                    @include('modules/liquidaciones/noEmpleado')
                                
                                @endif
                            </div>
                            <div class="tab-pane" id="cVistaPrevia">
                                @if(session()->has('Empleado'))

                                    @include('modules/liquidaciones/vista_previa')

                                @else
                                    @include('modules/liquidaciones/noEmpleado')
                                
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection