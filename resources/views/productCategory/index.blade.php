@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
    <a class="btn btn-success mt-1" href="{{url('/product_category/create')}}">
        <i class="fas fa-tags"></i>
        Agregar
    </a>
    <hr class="mt-2">
@stop

@section('content')
<div class="row row-cols-1 row-cols-md-3">
    <!-- Card -->
    @foreach( $productCategories as $Category )
    <div class="col mb-4"> 
        <div class="card h-100 card-outline {{($Category->status == true || $Category->status == 1) ? 'card-success' : 'card-danger'}}">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-tag"></i>
                    <!-- Nombre -->
                    {{ $Category -> name }}
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
                        {{ $Category -> description }}
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <!-- The footer of the card -->
                <div class="btn-group">
                    <!-- Boton Editar -->      
                    <a href="{{url('/product_category/edit/'.$Category->id)}}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                        Editar
                    </a>
                    <!-- Boton eliminar -->
                    <form action="{{ url('/product_category/delete/'.$Category->id) }}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('¿Deseas eliminar esta categoria?')" class="btn btn-danger">
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
