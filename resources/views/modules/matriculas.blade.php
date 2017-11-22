@extends('layouts.container')
<!--  -->
@section('Header')
<!--  -->
@parent
<!-- Aqui agregar todo el css y js  adicional que se requiera -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="{{ asset('css/sidebar_liquidacion_gris.css') }}">
<!-- Azul o negro-->
<link rel="stylesheet" href="{{ asset('css/tabs_liquidaciones.css') }}">
<script>
    $(document).ready(function () {


        $("#mAlumno").click(function(){
            $("#Alumno").toggle();
            $("#mAlumno").toggle();
            $("#m_Alumno").toggle();
            $("#VolverAlumno").toggle();
        });
        $("#VolverAlumno").click(function(){
            $("#Alumno").toggle();
            $("#mAlumno").toggle();
            $("#m_Alumno").toggle();
            $("#VolverAlumno").toggle();          
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
        $('#nEstudiante').on('input', function () {
            var Nombres = [];
            var Rut = [];
            var urlAutocompletar = "{{ route('autocompletar_alumno') }}" + "?Nombre_Estudiante=" + $(this).val(); // limitar caracteres, minimo 3 o 2 

            $.getJSON(urlAutocompletar, function (Estudiante) {

                for (var x = 0; x < Estudiante.length; x++) {
                    Nombres.push(Estudiante[x].Nombre);
                    Rut.push(Estudiante[x].Rut);
                }
            });

            $(this).autocomplete({
                source: Nombres,
                select: function (event, nombre) {
                    var index_rut = Nombres.indexOf(nombre.item.value);
                    $('#Rut_Estudiante').val(Rut[index_rut]);
                }
            });

        });
    });
</script>
@if(session()->has('Alumno'))
<script>
    $(document).ready(function(){
      $("#rm_alumno").click(function(){
        swal({
        title: "�Estas seguro que desea eliminar este alumno?",
        text: "Una vez eliminado no podra recuperar el registro!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: "{{ route('eliminar_alumno') }}",
            type: "GET",
            data: {nRut: "{{ session('Alumno')->Datos->Rut}}"},
            success: function (res) {
                swal("El alumno fue eliminado con exito!", {
                  icon: "success",
                });
                window.setTimeout(function(){ } ,5000);
                location.reload();
            }
          });
        } else {
          swal("Eliminaci�n cancelada!");
        }
      });
      });
    });
</script>
@endif
<!--
 
    <script src="{{ asset('js/mstriculas.js')}}"></script>  NeverMInd
-->


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
            
            @if(session()->has('succ'))
            <div class="alert alert-success">{{ session('succ') }}</div>
            @endif
            
            <div id="Tabs" class="container-fluid">
                <div class="card">
                    <div class="card-header row">
                        <h2 class="page-header col-10">
                            @if(session()->has('Alumno')) [{{ session('Alumno')->Datos->Nombre}}] 
                        </h2>
                        <button id="rm_alumno" type="button" class="btn btn-outline-danger col-2">Eliminar</button>
                        @endif
                    </div>                    <div class="card-body">
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
                            <li class="nav-item ml-auto  justify-content-end">
                                <form class="form-inline" method="POST" action="{{ route('BuscarAlumno') }}">
                                    {{ csrf_field() }}
                                    <input class=" form-control" type="text" name="Nombre_Estudiante" id="nEstudiante" data-action="{{ route('autocompletar_alumno') }}" placeholder="Nombre Alumno">
                                    <input type="text" name="Rut_Estudiante" id="Rut_Estudiante" hidden>
                                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </li>
                        </ul>
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="cDatos_alumno">
                                @if(session()->has('Alumno'))

                                    @include('modules/matriculas/datos_alumno')

                                @else
                                    @include('modules/matriculas/noAlumno')
                                
                                @endif
                            </div>

                            <div class="tab-pane" id="cApoderado">
                                @if(session()->has('Alumno'))

                                    @include('modules/matriculas/apoderado')

                                @else
                                    @include('modules/matriculas/noAlumno')
                                
                                @endif
                                
                            </div>
                            <div class="tab-pane" id="cAnt_familiares">
                                @if(session()->has('Alumno'))

                                    @include('modules/matriculas/ant_familiares')

                                @else
                                    @include('modules/matriculas/noAlumno')
                                
                                @endif
                            </div>
                            <div class="tab-pane" id="cSalud_alumno">
                                @if(session()->has('Alumno'))

                                    @include('modules/matriculas/salud_alumno')

                                @else
                                    @include('modules/matriculas/noAlumno')
                                
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
