@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('content_header')
    <h1>Reservaciones</h1>
    <a class="btn btn-success mt-1" href="{{url('/reservation/create')}}">
        <i class="fas fa-calendar-day"></i>
        Agregar
    </a>
    <hr class="mt-2">
@stop

@section('content')

    <div class="row row-cols-1 row-cols-md-3 my-3">

        <!-- Card -->
        @foreach ($reservations as $reservation)

            <div class="col-sm-12 col-md-5 mb-4">

                <div class="card card-outline h-100 {{(($reservation->status == 1) ? 'card-success' : (($reservation->status == 2) ? 'card-warning' : 'card-danger'))}}">

                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-calendar-alt"></i>
                            <!-- Numero de mesa -->
                            Reservación #{{ $reservation->id }}
                        </h5>
                    </div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-user"></i>
                                    Nombre del cliente:
                                </strong>
                                {{ $reservation->first_name }} {{ $reservation->last_name }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-id-card"></i>
                                    Cédula del cliente:
                                </strong>
                                {{ $reservation->identification }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                <i class="fas fa-glass-cheers"></i>
                                    Tipo de reservación:
                                </strong>
                                {{ $reservation->reservation_type }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-archway"></i>
                                    Salon:
                                </strong>
                                {{ $reservation->reservation_living_room }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-calendar-day"></i>
                                    Fecha de la reservación:
                                </strong>
                                {{ $reservation->reservation_date }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-hourglass-end"></i>
                                    Hora de la reservación:
                                </strong>
                                {{ $reservation->reservation_time }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-user-friends"></i>
                                    Número de personas:
                                </strong>
                                {{ $reservation->number_people }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-comment-alt"></i>
                                    Descripción:
                                </strong>
                                {{ $reservation->description }}
                            </li>

                        </ul>

                    </div>

                    <div class="card-footer text-center">

                        <!-- The footer of the card -->
                        <div class="row">

                            {{-- BOTON EDITAR --}}
                            <div class="col-sm-12 col-md-6">
                                <a href="{{url('/reservation/edit/'.$reservation->id)}}" class="btn btn-warning col-sm-12 my-1">
                                    <i class="fas fa-edit"></i>
                                    Editar
                                </a>
                            </div>

                            {{-- BOTON ELIMINAR --}}
                            <div class="col-sm-12 col-md-6">

                                <form action="{{url('/reservation/delete/'.$reservation->id)}}" method="post" class="form-delete">

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
@stop

@section('js')
    @include('sweetalert::alert')
    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Deseas eliminar esta reservacion?',
                text: 'Una vez eliminado esta reservacion no se podra volver a obtener la informacion de este.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then(res => {
                if(res.isConfirmed){
                    Swal.fire({
                        title: 'La reservacion fue eliminada correctamente!',
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
