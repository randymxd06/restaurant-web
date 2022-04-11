@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('content_header')
    <h1>Editar Reservación | #{{$id}}</h1>
    <a class="btn btn-primary mt-1" href="{{url('/reservation')}}">
        <i class="fas fa-arrow-left"></i>
        Volver
    </a>
    <hr class="mt-2">
    <!-- Mensaje de error -->
    @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        <i class="icon fas fa-exclamation-triangle"></i>{{$error}}
                    </li>
                    <hr>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- / -->
@stop

@section('content')

    <!-- FORMULARIO -->
    <form method="post" action="{{ url('/reservation/update/'.$id) }}">

        <!-- TOKEN -->
        @csrf

        {{method_field('PUT')}}

        {{-- BOTON QUE ABRE EL MODAL --}}
        <button type="button" class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#exampleModalScrollable">
            <i class="fas fa-user-check"></i>
            Seleccionar Cliente
        </button>

        {{-- INPUTS DEL CLIENTE --}}
        <div class="row">

            <!-- NOMBRE -->
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        </div>
                        <input disabled name="first_name" id="first_name" type="text" class="form-control" placeholder="Nombre del cliente" value="{{$dbCustomer->first_name}}">
                    </div>
                </div>
            </div>
            <!-- / -->

            <!-- APELLIDO -->
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Apellido</label>
                    <div class="input-group">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-dollar-sign"></i>
                            </span>
                        </div> -->
                        <input disabled name="last_name" id="last_name" type="text" class="form-control" placeholder="Apellido del cliente" value="{{$dbCustomer->last_name}}">
                    </div>
                </div>
            </div>
            <!-- / -->

            <!-- TELEFONO -->
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label>Teléfono</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input disabled name="phone" id="phone" type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text" placeholder="Teléfono del cliente" value="{{$dbCustomer->phone}}">
                    </div>
                </div>
            </div>
            <!-- / -->

            <!-- CORREO -->
            <div class="col-md-5 mb-2">
                <div class="form-group">
                    <label>Correo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input disabled name="email" id="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Correo electrónico del cliente" value="{{$dbCustomer->email}}">
                    </div>
                </div>
            </div>

        </div>

        <hr>

        {{-- LOS DEMAS INPUTS --}}
        <div class="form-row mt-4">

            <!-- TIPO RESERVACION -->
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label">Reservación para:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-glass-cheers"></i></span>
                        </div>
                        <select class="custom-select mr-sm-2" id="type_reservations_id" name="type_reservations_id">
                            <option selected="" disabled="">Selecciona un tipo de reservacion...</option>
                            @foreach($typeReservations as $typeReservation)
                                <option value="{{$typeReservation->id}}" {{( $dbCustomer->type_reservations_id == $typeReservation->id) ? 'selected' : ''}}>{{$typeReservation->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- / -->

            <!-- SALON -->
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label">Salón:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-person-booth "></i></span>
                        </div>
                        <select class="custom-select mr-sm-2" id="living_room_id" name="living_room_id">
                            <option selected="" disabled="">Selecciona un salon...</option>
                            @foreach($livingRooms as $livingRoom)
                                <option value="{{$livingRoom->id}}" {{( $dbCustomer->living_room_id == $livingRoom->id) ? 'selected' : ''}}>{{$livingRoom->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- / -->

            <!-- FECHA -->
            <div class="col-sm-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Fecha de la reservación:</label>
                    <div class="input-group date">
                        <input name="reservation_date" id="reservation_date" type="date" class="form-control" value="{{$date}}"/>
                    </div>
                </div>
            </div>
            <!-- / -->

            <!-- HORA -->
            <div class="col-sm-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Hora de la reservación:</label>
                    <div class="input-group date">
                        <input name="reservation_time" id="reservation_time" type="time" class="form-control" value="{{$time}}"/>
                    </div>
                </div>
            </div>
            <!-- / -->

            <!-- NUMERO DE PERSONAS -->
            <div class="col-sm-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Número de Personas:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                        </div>
                        <input type="number" class="form-control" id="number_people" name="number_people" value="{{$dbCustomer->number_people}}" placeholder="Escribe la cantidad de personas">
                    </div>
                </div>
            </div>
            <!-- / -->

            <!-- DESCRIPCIÓN -->
            <div class="col-sm-12 mb-2">
                <div class="form-group">
                    <label class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3" >{{$dbCustomer->description}}</textarea>
                </div>
            </div>
            <!-- / -->

            <input hidden type="text" name="customer_id" id="customer_id" value="{{$dbCustomer->customer_id}}">

        </div>

        <!-- NOTA: Al momento de crear la reserva el estado sera activo -->
        <!-- Estado -->
        <!-- <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="status"  name="status">
                <label class="custom-control-label" for="status">Estado</label>
            </div>
        </div> -->
        <!-- / -->

        <hr>

        <!-- Boton Guardar -->
        <button type="submit" class="btn btn-lg btn-success mt-4 mr-2">
            <i class="fas fa-calendar-check"></i>
            Reservar
        </button>

        <a class="btn btn-danger mt-4" href="{{url('/reservation')}}">
            <i class="fas fa-ban"></i>
            Cancelar
        </a>
        <!-- / -->

    </form>

    <!-- FIN DEL FORMULARIO -->
    <br><br><br>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalScrollableTitle">Seleccionando Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--                <form class="form-inline row justify-content-center">--}}
                    {{--                    <input class="form-control col-md-8" type="search" placeholder="Search" aria-label="Search">--}}
                    {{--                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
                    {{--                </form>--}}
                    {{--                <br>--}}
                    <div class="row">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Correo</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <th scope="row">{{$customer->id}}</th>
                                    <td>{{$customer->first_name.' '.$customer->last_name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs" data-dismiss="modal" onclick="selectCustomer('{{$customer->id}}', '{{$customer->first_name}}', '{{$customer->last_name}}', '{{$customer->phone}}', '{{$customer->email}}')">
                                            <i class="fas fa-hand-pointer"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')
    @include('sweetalert::alert')
    <script>

        function selectCustomer(id, first_name, last_name, phone, email){
            document.getElementById('customer_id').value = id;
            document.getElementById('first_name').value = first_name;
            document.getElementById('last_name').value = last_name;
            document.getElementById('phone').value = phone;
            document.getElementById('email').value = email;
        }

    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('#datetimepicker1').datetimepicker({
            icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        });
    </script>
@stop
