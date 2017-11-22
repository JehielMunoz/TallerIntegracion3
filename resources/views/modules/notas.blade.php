@extends('layouts.container')
<!--  -->
@section('Header')
<!--  -->
@parent
<!-- Aqui agregar todo el css y js  adicional que se requiera -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="{{ asset('css/sidebar_liquidacion_gris.css') }}">
<!-- Azul o negro-->
<link rel="stylesheet" href="{{ asset('css/tabs_liquidaciones.css') }}">

@endsection @section('panel')
<!--  -->
@endsection @section('navbar')
<!--  -->
@endsection @section('content')

<script>
  $(document).ready(Main);
  function Main() {
    $("button[name='btn-nivel']").click(List_lvl_alum);
  }

  function List_lvl_alum() {
    var code=$(this).val();
    var tite=$(this).text();
    $.ajax({
      data: {r: code},
      url: "{{route('ListarAlumno2')}}",
      type:"get",
      success: function(res){
        //console.log(res);
        var send ="";
        for (var i = 0; i < res.length; i++) {
          send +="<li class='nav-item'>";
          send +="<button data-toggle='tab' class='btn btn-primary nav-link ' name='code_c' onclick='Set_val(this.value,this.id)' id='"+tite+"' value='"+res[i]['code_curso']+"'>"+res[i]['code_curso']+"</button>";
          send +="</li><div style='width: 3px'></div>";
        }
        $("#Listar_aqui").html(send);
      }
    });
  }
  function Set_val(x,y) {
    //console.log(x,y);
    $.ajax({
      data: {c: x, t: y},
      url: "{{route('ListarAlumno')}}",
      type:"get",
      success: function(res){
        //console.log(res['dato'],res['nota']);
        var send ="";
        for (var i = 0; i < res['dato'].length; i++) {
          send +="<tr><th scope='row'>"+res['dato'][i]['Rut']+"</th>";
          send +="<td>"+res['dato'][i]['Nombre']+"</td>";
          if (res['dato'][i]['Rut']==res['nota'][i]['rut_alu']) {
            for (var i = 0; i < res['nota'].length; i++) {
              send +="<td>"+res['nota'][i]['nota']+"</td>";
            }
          }
          send += "</tr>";
        }
        $("#tlista_cell").html(send);
      }
    });
  }
</script>
<div class="container-fluid">
    <div class="row">
        
        @include('modules.notas.menu_notas')
        
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
                            @if(session()->has('Alumno')) [{{ session('Alumno')->Datos->Nombre}}] @endif
                        </h2>
                    </div>
      
        <div class="card-body">
          <ul class="nav nav-pills" id="Listar_aqui">
            <!--<li class="nav-item ml-auto  justify-content-end">
                <form class="form-inline" method="POST" action="{{ route('BuscarAlumno') }}">
                    {{ csrf_field() }}
                    <input class=" form-control" type="text" name="Nombre_Estudiante" id="nEstudiante" data-action="{{ route('autocompletar_alumno') }}" placeholder="Nombre Alumno">
                    <input type="text" name="Rut_Estudiante" id="Rut_Estudiante" hidden>
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </li>-->
          </ul>
        <div class="tab-content clearfix">
            <div class="tab-pane active">
              @include('modules/notas/listar_alumno')
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</div>

@endsection