@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
    <hr>
@stop

@section('content')
<div class="row row-cols-1 row-cols-md-3">
    <!-- Card -->
    <div class="col mb-4"> 
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-tag"></i>
                    <!-- Nombre -->
                    Categoria
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>
                            <i class="fas fa-file-alt"></i>
                            Descripción: 
                        </strong>
                        <!-- Descripcion -->
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
    <!-- / -->
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
