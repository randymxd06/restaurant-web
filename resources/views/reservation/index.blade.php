@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('content_header')
    <h1>Reservaciones</h1
@stop

@section('content')
    <p>Este es el modulo de Reservaciones</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')
    <script>Console.log('HOLA');</script>
@stop