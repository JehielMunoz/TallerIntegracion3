@extends('layouts.container')
@section('panel')

@endsection
@section('content')
<div class="container-fluid">
  <h2>Registro de Datos de Alumno.-</h2>
</div>
<div class="container-fluid" style="margin-top: 3em;">
  <div class="form-group row ">
    <label for="example-text-input" class="col-2 col-form-label">Nombres:</label>
    <div class="col-10 col-md-5">
      <input class="form-control" type="text" placeholder="Ambos Nombres" id="namex_e">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-search-input" class="col-2 col-form-label">Apellidos:</label>
    <div class="col-10 col-md-5">
      <input class="form-control" type="search" placeholder="Ambos Apellidos" id="lastn_e">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-url-input" class="col-2 col-form-label">Promedio Ingreso:</label>
    <div class="col-10 col-md-5">
      <input class="form-control" type="number" placeholder="Ingrese Promedio" id="prome_e" min="0" step="0.1">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-datetime-local-input" class="col-2 col-form-label">Fecha de Nacimiento:</label>
    <div class="col-10 col-md-5">
      <input class="form-control" type="date" id="fenac_e">
    </div>
  </div>
</div>
<div class="container-fluid">
  <h2>Registro de Datos Apoderado.-</h2>
</div>
<div class="container-fluid" style="margin-top: 4em;">
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Nombres:</label>
    <div class="col-10 col-md-5">
      <input class="form-control" type="text" placeholder="Ambos Nombres" id="namex_p">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-search-input" class="col-2 col-form-label">Apellidos:</label>
    <div class="col-10 col-md-5">
      <input class="form-control" type="search" placeholder="Ambos Apellidos" id="lastn_p">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-email-input" class="col-2  col-form-label">Email</label>
    <div class="col-10 col-md-5">
      <input class="form-control" type="email" placeholder="bootstrap@example.com" id="email_p">
    </div>
  </div>
</div>
<div class="container-fluid row" style="margin-top: 5em;">
<div class="col-2"></div>
<div class="col-md-4 col-md-offset-1" style="height: 13em;">
  <a href="#" role="button" class="btn btn-outline-primary btn-lg btn-block">Ingresar Registro</a>
</div>
</div>
@endsection