@extends('adminlte::page')

@section('title', 'Cocina')

@section('content_header')
    <h1>Cocina</h1
@stop

@section('content')
    <p>Este es el modulo de cocina</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')
    <script>Console.log('HOLA');</script>
@stop
