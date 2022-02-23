@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos</h1>
    <hr>
@stop

@section('content')

@stop 

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')
    <script>
        Console.log('HOLA');
    </script>
@stop
