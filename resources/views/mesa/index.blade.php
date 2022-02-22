@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1>Mesas</h1>
    <br>
    <hr>
    <br>
@stop

@section('content')
<div class="row row-cols-1 row-cols-md-3">
    <!-- Card -->
    <div class="col mb-4"> 
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-chair"></i>
                    Mesa #00
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>
                            <i class="fas fa-archway"></i>
                            Salon:
                        </strong>
                            Principal
                    </li>

                    <li class="list-group-item">
                        <strong>
                            <i class="fas fa-male"></i>
                            Capacidad de personas: 
                        </strong>
                        4
                    </li>
                    <li class="list-group-item">
                        <strong>
                            <i class="fas fa-file-alt"></i>
                            Descripción: 
                        </strong>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <!-- The footer of the card -->
                <div class="btn-group">
                    <button class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                        Editar
                    </button>
                    <button class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
</div>
@stop 

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    <style>
        .card-title{
            font-weight: bold !important
        }
    </style>
@stop

@section('js')
    <script>
        Console.log('HOLA');
    </script>
@stop
