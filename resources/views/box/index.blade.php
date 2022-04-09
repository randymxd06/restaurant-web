@extends('adminlte::page')

@section('title', 'Caja')

@section('content_header')
    <h1>Cajas</h1>
    <a class="btn btn-success mt-1" href="{{url('/box/create')}}">
        <i class="fas fa-chair"></i>
        Agregar
    </a>
    <hr class="mt-2">
@stop

@section('content')
    <div class="row row-cols-1 row-cols-md-3">

        <!-- Card -->
        @foreach ($boxes as $box)

            <div class="col mb-4">

                <div class="card card-outline h-100 {{(($box->status == 1) ? 'card-success' : (($box->status == 2) ? 'card-warning' : 'card-danger'))}}">

                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-chair"></i>
                            Caja #{{ $box->id }}
                        </h5>
                    </div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-archway"></i>
                                    Usuario:
                                </strong>
                                {{ $box->name }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-male"></i>
                                    Dispositivo usado:
                                </strong>
                                {{ $box->device_use }}
                            </li>

                        </ul>

                    </div>

                    <div class="card-footer text-center">

                        <!-- The footer of the card -->
                        <div class="btn-group">

                            {{-- BOTON EDITAR --}}
                            <a href="{{url('/box/edit/'.$box->id)}}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                                Editar
                            </a>

                            {{-- BOTON ELIMINAR --}}
                            <form action="{{url('/box/delete/'.$box->id)}}" method="post">

                                @csrf

                                {{method_field('DELETE')}}

                                <button type="submit" onclick="return confirm('Deseas eliminar esta caja?')" class="btn btn-danger" value="borrar">
                                    <i class="fas fa-trash"></i>
                                    Eliminar
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

    @endforeach
    <!-- /Card -->
    </div>
@stop

@section('css')
    
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
