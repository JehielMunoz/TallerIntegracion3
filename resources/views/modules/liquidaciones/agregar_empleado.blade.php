<?php
 use App\Http\Controllers\Busqueda_personal;
?>
@extends('layouts.container')
@section('Header')
<!-- Aqui agregar todo el css y js  adicional que se requiera -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous">
    
</script>

<script>
    
    var fono_count = 0;
    var cargo_count = 0;
    
    $(document).ready(function () {
        $('#add_fono').on('click', function () {
            
            
            var s_html = `
                    <tr>
                        <th colspan="2"></th>
                    </tr>                    
                    <tr>
                        <td>Numero de telefono</td>
                        <td><input class="input_fono" maxlength="18" type="text" size="65" id="Nombre" name="fono[`+fono_count.toString()+`]"  placeholder="Numero" value=""></td>
                    </tr>
                    `;
            
            
            //$('#form_agregar_alumno').prepend(s_html);  
            
            $(s_html).appendTo("#table_empledos_agregar_fono");
            //$(s_html).insertAfter( $( "#div_hermanos" ) );
            fono_count += 1;
        });
        
        $('#add_cargo').on('click', function () {
            
            
            var s_html = `
                    <tr>
                        <th colspan="2"></th>
                    </tr>                    
                    <tr>
                        <td>Cargo</td>
                        <td>
                            <select name="id_cargo[`+cargo_count.toString()+`]">
                                {{Busqueda_personal::agregar_empleado_cargos()}}
                            </select>
                        </td>
                    </tr>
                    `;
            
            
            
            
            $(s_html).appendTo("#table_empledos_agregar_cargo");
            cargo_count += 1;
        });
        
        
        $(".input_rut").bind("keyup blur",
            function (){
                $(this).val( $(this).val().replace(/[^0-9k.-]/,"") );}
        );
        
        $(".input_fono").bind("keyup blur",
            function (){
                $(this).val( $(this).val().replace(/[^0-9( )]/,"") );}
        );
        
    });

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
        
        @include('modules.liquidaciones.menu_liquidaciones')
        
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
                            Agregar empleado
                        </h2>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a href="#cDatos_empleado" data-toggle="tab" class="nav-link  active">Datos Empleado</a>
                            </li>
                        </ul>
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="cDatos_empleado">
                                
                                @include('modules/liquidaciones/agregar/datos_empleado')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
