@extends('adminlte::page')

@section('title', 'Metodo de pago')

@section('content_header')
    <h1 class="mb-2">Metodo de pago</h1>
    <a class="btn btn-success mt-1" href="{{url('/payment-method/create')}}">
        <i class="fas fa-tags"></i>
        Agregar
    </a>
    <hr class="mt-2">
@stop

@section('content')
    <div class="row row-cols-1 row-cols-md-3">

        <!-- Card -->
        @foreach( $paymentMethods as $paymentMethod )
            <div class="col mb-4">
                <div class="card h-100 card-outline {{($paymentMethod->status == true || $paymentMethod->status == 1) ? 'card-success' : 'card-danger'}}">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-tag"></i>
                            <!-- Nombre -->
                            {{ $paymentMethod -> name }}
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
                                {{ $paymentMethod -> description }}
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">

                        <!-- The footer of the card -->
                        <div class="row">

                            <!-- Boton Editar -->
                            <div class="col-sm-12 col-md-6">
                                <a href="{{url('/payment-method/edit/'.$paymentMethod->id)}}" class="btn btn-warning col-sm-12 my-1">
                                    <i class="fas fa-edit"></i>
                                    Editar
                                </a>
                            </div>
                            <!-- Boton eliminar -->

                            <div class="col-sm-12 col-md-6">
                                <form action="{{ url('/payment-method/delete/'.$paymentMethod->id) }}" method="post" class="form-delete">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger col-sm-12 my-1">
                                        <i class="fas fa-trash"></i>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    <!-- / -->
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
    @include('sweetalert::alert')
    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Deseas eliminar este metodo de pago?',
                text: 'Una vez eliminado este metodo de pago no se podra volver a obtener la informacion de este.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then(res => {

                if(res.isConfirmed){
                    Swal.fire({
                        title: 'Metodo de pago eliminado correctamente!',
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
