@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
    <a class="btn btn-success mt-1" href="{{url('/customer/create')}}">
        <i class="fas fa-users"></i>
        Agregar
    </a>
    <hr class="mt-2">
@stop

@section('content')

<div class="row row-cols-1 row-cols-md-3">

    <!-- Card -->
    @foreach ($customers as $customer)

        <div class="col-md-6">

        <div class="card mb-3 card-outline h-100 {{(($customer->customer_status == 1) ? 'card-success' : (($customer->customer_status == 2) ? 'card-warning' : 'card-danger'))}}">

            <div class="row g-0">

                <div class="col-md-4 d-flex">
                    <img src="{{URL::asset('images/daraguma-icon.png')}}" class="img-fluid rounded-start" alt="...">
                </div>

                <div class="col-md-8">

                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-user"></i>
                            Cliente #{{ $customer->customer_id }}
                        </h5>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $customer->first_name.' '.$customer->last_name }}</h5>
                        <p class="card-text">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>
                                        <i class="fas fa-user-tag"></i>
                                        Tipo de cliente:
                                    </strong>
                                    {{ $customer->name }}
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        <i class="fas fa-id-card"></i>
                                        Cédula:
                                    </strong>
                                    {{ $customer->identification }}
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        <i class="fas fa-venus-mars"></i>
                                        Sexo:
                                    </strong>
                                    {{ $customer->sex_name }}
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        <i class="fas fa-ring"></i>
                                        Estado civil:
                                    </strong>
                                    {{ $customer->civil_status_name }}
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        <i class="fas fa-flag"></i>
                                        Nacionalidad:
                                    </strong>
                                    {{ $customer->nationality_name }}
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        <i class="fas fa-birthday-cake"></i>
                                        Fecha de nacimiento:
                                    </strong>
                                    {{ $customer->birth_date }}
                                </li>
                            </ul>
                        </p>
                    </div>

                    <div class="text-center">

                        <!-- The footer of the card -->
                        <div class="row">

                            {{-- BOTON EDITAR --}}
                            <div class="col-sm-12 col-md-6">
                                <a href="{{url('/customer/edit/'.$customer->customer_id)}}" class="btn btn-warning col-sm-12 my-1">
                                    <i class="fas fa-edit"></i>
                                    Editar
                                </a>
                            </div>

                            <div class="col-sm-12 col-md-6">

                                <form action="{{url('/customer/delete/'.$customer->customer_id)}}" method="post" class="form-delete">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger col-sm-12 my-1" value="borrar">
                                        <i class="fas fa-trash"></i>
                                        Eliminar
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

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
        .img-fluid{
            object-fit: cover;
        }
    </style>
@stop

@section('js')
    @include('sweetalert::alert')
    <script>
        $('.form-delete').submit(function(e){
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
                if(res.isConfirmed){
                    Swal.fire({
                        title: 'Cliente eliminado correctamente!',
                        icon: 'success',
                        showCancelButton: false,
                    })
                    setTimeout(() => {
                        this.submit();
                    }, 1000)
                }
            })
        })
    </script>
@stop
