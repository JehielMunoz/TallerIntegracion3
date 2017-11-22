<!-- Stored in resources/views/child.blade.php -->

@extends('modules.pruebaParent')

@section('title', 'Page Title')

@section('sidebar')
    <!--@parent -->

    <p>Este es el nuevo mensaje agrado al padre sidebar, however va a ser mostrado solo </p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection