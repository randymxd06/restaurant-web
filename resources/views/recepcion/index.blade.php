@extends('adminlte::page')

@section('title', 'Recepción')

@section('content_header')
    <h1>Recepcion</h1>
@stop

@section('content')
    <p>Este es el modulo de recepcion</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')
    <script>Console.log('HOLA');</script>
@stop