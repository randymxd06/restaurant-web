@extends('adminlte::page')

@section('title', 'Tipo de reservacion')

@section('content_header')
    <h1>Tipo de reservacion</h1>
    <a class="btn btn-success mt-1" href="{{url('/type-reservation/create')}}">
        <i class="fas fa-chair"></i>
        Agregar
    </a>
    <hr class="mt-2">
@stop

@section('content')

    <div class="row row-cols-1 row-cols-md-3">

        <!-- Card -->
        @foreach ($typeReservations as $typeReservation)

            <div class="col mb-4">

                <div class="card card-outline h-100 {{(($typeReservation->status == 1) ? 'card-success' : (($typeReservation->status == 2) ? 'card-warning' : 'card-danger'))}}">

                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-chair"></i>
                            {{ $typeReservation->name }}
                        </h5>
                    </div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-male"></i>
                                    Descripción
                                </strong>
                                {{ $typeReservation->description }}
                            </li>

                        </ul>

                    </div>

                    <div class="card-footer text-center">

                        <!-- The footer of the card -->
                        <div class="row">

                            {{-- BOTON EDITAR --}}
                            <div class="col-sm-12 col-md-6">
                                <a href="{{url('/type-reservation/edit/'.$typeReservation->id)}}" class="btn btn-warning col-sm-12 my-1">
                                    <i class="fas fa-edit"></i>
                                    Editar
                                </a>
                            </div>

                            {{-- BOTON ELIMINAR --}}
                            <div class="col-sm-12 col-md-6">
                                <form action="{{url('/type-reservation/delete/'.$typeReservation->id)}}" method="post" class="form-delete">
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
    @include('sweetalert::alert')
    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Deseas eliminar este tipo de reservación?',
                text: 'Una vez eliminado este tipo de reservacion no se podra volver a obtener la informacion de este.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then(res => {
                if(res.isConfirmed){
                    Swal.fire({
                        title: 'Tipo de reservacioón eliminado correctamente!',
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
