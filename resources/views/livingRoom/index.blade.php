@extends('adminlte::page')

@section('title', 'Salones')

@section('content_header')
    <h1>Salones</h1>
    <a class="btn btn-success mt-1" href="{{url('/livingrooms/create')}}">
        <i class="fas fa-person-booth"></i>
        Agregar
    </a>
    <hr class="mt-2">
@stop

@section('content')
<div class="row row-cols-1 row-cols-md-3">
    <!-- Card -->
    @foreach( $livingRooms as $livingRoom )
    <div class="col mb-4"> 
        <div class="card card-outline {{($livingRoom->status == true || $livingRoom->status == 1) ? 'card-success' : 'card-danger'}}">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-person-booth"></i>
                    <!-- Nombre -->
                    {{ $livingRoom -> name }}
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
                        {{ $livingRoom -> description }}
                    </li>
                    <li class="list-group-item">
                        <strong>
                            <i class="fas fa-chair"></i>
                            Capacidad de Mesas: 
                        </strong>
                        <!-- Descripcion -->
                        {{ $livingRoom -> tables_capacity }}
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <!-- The footer of the card -->
                <div class="btn-group">
                    <!-- Boton Editar -->      
                    <a href="{{url('/livingrooms/edit/'.$livingRoom->id)}}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                        Editar
                    </a>
                    <!-- Boton eliminar -->
                    <form action="{{ url('/livingrooms/delete/'.$livingRoom->id) }}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('¿Deseas eliminar este salon?')" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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
