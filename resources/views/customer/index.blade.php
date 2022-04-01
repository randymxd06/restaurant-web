@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1>Clientes</h1>
    <a class="btn btn-success mt-1" href="{{url('/customer/create')}}">
        <i class="fas fa-chair"></i>
        Agregar
    </a>
    <hr class="mt-2">
@stop

@section('content')

    <div class="row row-cols-1 row-cols-md-3">

        <!-- Card -->
        @foreach ($customers as $customer)

            <div class="col mb-4">

                <div class="card card-outline h-100 {{(($customer->status == 1) ? 'card-success' : (($customer->status == 2) ? 'card-warning' : 'card-danger'))}}">

                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-chair"></i>
                            Cliente #{{ $customer->id }}
                        </h5>
                    </div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-male"></i>
                                    Nombre del cliente:
                                </strong>
                                {{ $customer->first_name }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-file-alt"></i>
                                    Tipo de cliente:
                                </strong>
                                {{ $customer->name }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-file-alt"></i>
                                    Cédula:
                                </strong>
                                {{ $customer->identification }}
                            </li>

                        </ul>

                    </div>

                    <div class="card-footer text-center">

                        <!-- The footer of the card -->
                        <div class="btn-group">

                            <a href="{{url('/customer/edit/'.$customer->id)}}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                                Editar
                            </a>

                            <form action="{{url('/customer/delete/'.$customer->id)}}" method="post">

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
