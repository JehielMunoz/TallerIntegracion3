<?php
 use App\Http\Controllers\controller_inventario;
?>

@extends('layouts.container')
@section('Header')
<!-- Aqui agregar todo el css y js  adicional que se requiera -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous">
    
</script>

<script>
    
    
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
        @include('modules.inventario.menu_inventario')
        
        <div class="col-md-9 cold-xs-11" id="contenedor_tabs">
            
            @if(count($errors))
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif    
            
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
                            Modificar Item
                        </h2>
                    </div>
                    <div class="card-body">
                    
                        <div class="tab-content clearfix">
                            
                            <div class="tab-pane active" id="cDatos_item">
                                <div id="div_tablas_lista_items">
                                @if(request()->filled('Serial'))
                                     {{  controller_inventario::cargar_modificar(request('Serial')) }} 
                                </div>
                                @endif
                            

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
