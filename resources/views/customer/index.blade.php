@extends('adminlte::page')

@section('title', 'Clientes')

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

                <div class="card card-outline h-100 {{(($customer->customer_status == 1) ? 'card-success' : (($customer->customer_status == 2) ? 'card-warning' : 'card-danger'))}}">

                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-chair"></i>
                            Cliente #{{ $customer->customer_id }}
                        </h5>
                    </div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush">

                            {{-- TIPO DE CLIENTE --}}
                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-file-alt"></i>
                                    Tipo de cliente:
                                </strong>
                                {{ $customer->name }}
                            </li>

                            {{-- NOMBRE Y APELLIDO DEL CLIENTE --}}
                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-male"></i>
                                    Nombre:
                                </strong>
                                {{ $customer->first_name.' '.$customer->last_name }}
                            </li>

                            {{-- CEDULA DEL CLIENTE --}}
                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-file-alt"></i>
                                    Cédula:
                                </strong>
                                {{ $customer->identification }}
                            </li>

                            {{-- SEXO DEL CLIENTE --}}
                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-file-alt"></i>
                                    Sexo:
                                </strong>
                                {{ $customer->sex_name }}
                            </li>

                            {{-- ESTADO CIVIL DEL CLIENTE --}}
                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-file-alt"></i>
                                    Estado civil:
                                </strong>
                                {{ $customer->civil_status_name }}
                            </li>

                            {{-- NACIONALIDAD DEL CLIENTE --}}
                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-file-alt"></i>
                                    Nacionalidad:
                                </strong>
                                {{ $customer->nationality_name }}
                            </li>

                            {{-- FECHA DE NACIMIENTO DEL CLIENTE --}}
                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-file-alt"></i>
                                    Fecha de nacimiento:
                                </strong>
                                {{ $customer->birth_date }}
                            </li>

                        </ul>

                    </div>

                    <div class="card-footer text-center">

                        <!-- The footer of the card -->
                        <div class="btn-group">

                            <a href="{{url('/customer/edit/'.$customer->customer_id)}}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                                Editar
                            </a>

                            <form action="{{url('/customer/delete/'.$customer->customer_id)}}" method="post" class="form-delete">

                                @csrf

                                {{method_field('DELETE')}}

                                <button type="submit" class="btn btn-danger" value="borrar">
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
    @include('sweetalert::alert')
    <script>
        $('.form-delete').submit(e => {
            e.preventDefault()
            Swal.fire({
                title: 'Deseas eliminar este cliente?',
                text: 'Una vez eliminado este cliente no se podra volver a obtener la informacion de este.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then(res => {
                if(res.isComfirmed){
                    this.submit()
                }
            })
        })
    </script>
@stop
