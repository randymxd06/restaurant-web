@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
    <h1>Compras</h1>
@stop

@section('content')
    <p>Este es el modulo de compras.</p>
    <p>En este modulo se registraran las comprar realizadas de los ingredientes. El cual incrementara el stock de dicho ingrediente.</p>
@stop

@section('css')
    
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')
    <script>Console.log('HOLA');</script>
@stop

