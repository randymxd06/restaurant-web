@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1>Mesas</h1>
    <hr>
@stop

@section('content')
<div class="row row-cols-1 row-cols-md-3">

    <!-- Card -->
    @foreach ($tables as $table)

        <div class="col mb-4">

            <div class="card card-outline card-warning" style="min-height: 100%;">

                <div class="card-header">
                    <h5 class="card-title">
                        <i class="fas fa-chair"></i>
                        <!-- Numero de mesa -->
                        Mesa #{{ $table->id }}
                    </h5>
                </div>

                <div class="card-body">

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <strong>
                                <i class="fas fa-archway"></i>
                                Salon:
                            </strong>
                            <!-- Salón -->
                            {{ $table->living_room_id }}
                        </li>

                        <li class="list-group-item">
                            <strong>
                                <i class="fas fa-male"></i>
                                Capacidad de personas:
                            </strong>
                            <!-- Capacidad de personas -->
                            {{ $table->people_capacity }}
                        </li>

                        <li class="list-group-item">
                            <strong>
                                <i class="fas fa-file-alt"></i>
                                Descripción:
                            </strong>
                            <!-- Descripcion -->
                            {{ $table->description }}
                        </li>

                    </ul>

                </div>

                <div class="card-footer text-center">

                    <!-- The footer of the card -->
                    <div class="btn-group">

                        {{-- BOTON EDITAR --}}
                        <a href="{{url('/mesas/edit/'.$table->id)}}" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                            Editar
                        </a>

                        {{-- BOTON ELIMINAR --}}
                        <form action="{{url('/mesas/delete/'.$table->id)}}" method="post">

                            @csrf

                            {{method_field('DELETE')}}

                            <button type="submit" onclick="return confirm('Deseas eliminar esta mesa?')" class="btn btn-danger" value="borrar">
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
