@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pedidos Rapidos</h1
@stop

@section('content')
    <p>Este es el modulo de pedidos rapidos</p>
@stop

@section('css')
    
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')
    <script>Console.log('HOLA');</script>
@stop
