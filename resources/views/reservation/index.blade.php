@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('content_header')
    <h1>Reservaciones</h1
@stop

@section('content')
    <div class="row row-cols-1 row-cols-md-3">

        <!-- Card -->
        @foreach ($reservations as $reservation)

            <div class="col mb-4">

                <div class="card card-outline h-100 {{(($reservation->status == 1) ? 'card-success' : (($reservation->status == 2) ? 'card-warning' : 'card-danger'))}}">

                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-chair"></i>
                            <!-- Numero de mesa -->
                            Reservación #{{ $reservation->id }}
                        </h5>
                    </div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-archway"></i>
                                    Nombre del cliente:
                                </strong>
                                {{ $reservation->first_name }} {{ $reservation->last_name }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-archway"></i>
                                    Cédula del cliente:
                                </strong>
                                {{ $reservation->identification }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-archway"></i>
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
                                    <i class="fas fa-archway"></i>
                                    Fecha de la reservación:
                                </strong>
                                {{ $reservation->date_time }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-archway"></i>
                                    Número de personas:
                                </strong>
                                {{ $reservation->number_people }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-archway"></i>
                                    Descripción:
                                </strong>
                                {{ $reservation->description }}
                            </li>

                        </ul>

                    </div>

                    <div class="card-footer text-center">

                        <!-- The footer of the card -->
                        <div class="btn-group">

                            {{-- BOTON EDITAR --}}
                            <a href="{{url('/reservation/edit/'.$reservation->id)}}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                                Editar
                            </a>

                            {{-- BOTON ELIMINAR --}}
                            <form action="{{url('/reservation/delete/'.$reservation->id)}}" method="post">

                                @csrf

                                {{method_field('DELETE')}}

                                <button type="submit" onclick="return confirm('Deseas eliminar esta reservación?')" class="btn btn-danger" value="borrar">
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
@stop

@section('js')
    @include('sweetalert::alert')
    <script>Console.log('HOLA');</script>
@stop
