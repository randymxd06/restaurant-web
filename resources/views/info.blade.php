@extends('adminlte::page')

@section('title', 'Info')

@section('content_header')
<div clas="row d-flex justify-content-center">
    <img src="{{URL::asset('images/daraguma-black-2.png')}}" style="width: 35%; margin: auto;">
</div>
<hr>
<h1>Información sobre el sistema.</h1>
<p>Sistema web para restaurante</p>
@stop

@section('content')
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <strong>Lenguaje Principal: </strong>
            <span class="badge badge-danger">
                Laravel <i class="fab fa-laravel"></i>
            </span>
        </li>
        <li class="list-group-item">
            <strong>Secundarios: </strong>
            <span class="badge badge-primary">
                JavaScript <i class="fab fa-js-square"></i>
            </span>
            <span class="badge badge-success">
                Node <i class="fab fa-node"></i>
                NodeJS<i class="fab fa-node-js"></i>
            </span>
            <span class="badge badge-danger">
                <i class="fab fa-npm"></i>
            </span>
        </li>
        <li class="list-group-item">
            <strong>Alojamiento: </strong>
            <span class="badge badge-dark">GitHub <i class="fab fa-github"></i></span>
            <span class="badge badge-success">Google Drive<i class="fab fa-google-drive"></i></span>
        </li>
        <li class="list-group-item">
            <strong>Frameworks: </strong>
            <span class="badge badge-primary">Font-Awesome <i class="fab fa-font-awesome"></i></span>
            <span class="badge badge-primary" style="background-color: #7952b3 !important;">Bootstrap <i class="fab fa-bootstrap"></i></span>
        </li>
        <li class="list-group-item">
            <strong>Comunicación: </strong>
            <span class="badge badge-primary">Trello <i class="fab fa-trello"></i></span>
            <span class="badge badge-dark">Discord <i class="fab fa-discord"></i></span>
        </li>
        <li class="list-group-item">
            <strong>Base de datos: </strong><span class="badge badge-warning">MySQL <i class="fas fa-database"></i></span>
        </li>
        <li class="list-group-item">
            <strong>Version: </strong>3.9.4
        </li>
        <li class="list-group-item">
            <strong>Integrantes: </strong>
        </li>
        <li class="list-group-item">
            2-18-0300 | Randy R. Martínez Cepeda
        </li>
        <li class="list-group-item">
            2-18-0655 | Daury Enmanuel Guzmán Lantigua
        </li>
    </ul>
@stop        
@section('css')
    
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    @stop

@section('js')
    <script>Console.log('HOLA');</script>
@stop

