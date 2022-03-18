@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1>Realizar Reservación</h1>
    
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
<form method="post" action="{{ url('/reservations/store') }}">
    <!-- TOKEN -->
    @csrf
    <!-- Cliente -->
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalScrollable">
        <i class="fas fa-user-check"></i>
        Seleccionar Cliente
    </button>

    <div class="form-row">
        <!-- Nombre -->
        <div class="col-md-4 mb-2">
            <div class="form-group">
                <label class="form-label">Nombre</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div> 
        <!-- / -->

        <!-- Apellido -->
        <div class="col-md-4 mb-2">
            <div class="form-group">
                <label class="form-label">Apellido</label>
                <div class="input-group">
                    <!-- <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div> -->
                    <input type="text" class="form-control">
                </div>
            </div>
        </div> 
        <!-- / -->
        <!-- Telefono -->
        <div class="col-md-4 mb-2">
            <div class="form-group">
                <label>Teléfono</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text">
                </div>
            </div>
        </div> 
        <!-- / -->
    </div>
    
    <div class="form-row">
        <!-- Correo -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label>Correo</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
        </div> 
        <!-- / -->
    </div>
    <!-- / -->
    <hr>
    <br>
    <div class="form-row">
        <!-- Tipo Reservacion -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Reservación para:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-glass-cheers"></i></span>
                    </div>
                    <select class="custom-select mr-sm-2" id="" name="">
                        <option selected="" disabled="">Choose...</option>
                        <option value="1">One</option>
                        <option value="2">One</option>
                        <option value="3">One</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- / -->
        <!-- Salon -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Salón:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-person-booth "></i></span>
                    </div>
                    <select class="custom-select mr-sm-2" id="" name="">
                        <option selected="" disabled="">Choose...</option>
                        <option value="1">One</option>
                        <option value="2">One</option>
                        <option value="3">One</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- / -->
    </div>

    <div class="form-row">
        <!-- Fecha y Hora -->
        <div class="col-sm-6 mb-2">
            <div class="form-group">
                <label class="form-label">Fecha & Hora:</label>
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>        
        <!-- / -->
        <!-- Numero de personas -->
        <div class="col-sm-6 mb-2">
            <div class="form-group">
                <label class="form-label">Número de Personas:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                    </div>
                    <input type="number" class="form-control" id="" name="" value="">
                </div>
            </div>
        </div>
        <!-- / -->
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
    <button type="submit" class="btn btn-lg btn-success mt-4">
        <i class="fas fa-calendar-check"></i>
        Reservar
    </button>
    <a class="btn btn-danger mt-4" href="{{url('/reservations')}}">
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
                <form class="form-inline row justify-content-center">
                    <input class="form-control col-md-8" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <br>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr><tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr><tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Seleccionar</button>
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
