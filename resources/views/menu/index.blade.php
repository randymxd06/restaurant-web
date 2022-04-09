@extends('adminlte::page')

@section('title', 'Menú')

@section('content_header')
    <h1>Menú</h1
@stop

@section('content')
    <p>Este es el modulo de menú</p>
@stop

@section('css')
    
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')
    <script>Console.log('HOLA');</script>
@stop
