<?php
 use App\Http\Controllers\controller_inventario;
?>
@extends('layouts.container')
<!--  -->
@section('Header')
<!--  -->
@parent
<!-- Aqui agregar todo el css y js  adicional que se requiera -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
<script src="js/twbs-pagination/jquery.twbsPagination.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="{{ asset('css/sidebar_liquidacion_gris.css') }}">
<!-- Azul o negro-->
<link rel="stylesheet" href="{{ asset('css/tabs_liquidaciones.css') }}">
<script>
 
    $(document).ready(function () {
    
        var obj = $('#pagination').twbsPagination({
            totalPages: {{ controller_inventario::num_inventario_tablas() }},
            visiblePages: 10,
            onPageClick: function (event, page) {
                $('#div_tablas_lista_items table').hide();
                $('#tabla_items_'+page).show();
            }
        });
        
        
    });
        

</script>


@endsection @section('panel')
<!--  -->
@endsection @section('navbar')
<!--  -->
@endsection @section('content')
<div class="container-fluid">
    <div class="row">
        
        @include('modules.inventario.menu_inventario')
        
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
                            Inventario
                        </h2>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            
                            
                            
                            
                        </ul>
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="cDatos_alumno">

                                    @include('modules/inventario/tabla_inventario')
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection