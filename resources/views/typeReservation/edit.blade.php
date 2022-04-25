@extends('adminlte::page')

@section('title', 'Tipo de Reservacion')

@section('content_header')
    <h1 class="mb-4">Editar tipo de reservación | #{{$typeReservation->id}}</h1>
    <a class="btn btn-primary mt-1" href="{{url('/type-reservation')}}">
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
    <form method="post" action="{{ url('/type-reservation/update/'.$typeReservation->id) }}">

        <!-- TOKEN -->
        @csrf

        {{method_field('PUT')}}

        <!-- NOMBRE DEL TIPO DE RESERVACION -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Tipo de reservación</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user-friends"></i>
                    </span>
                    </div>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Escribe el nombre del tipo de reservación" value="{{$typeReservation->name}}"/>
                </div>
            </div>
        </div>
        <!-- / -->


        <!-- Descripción -->
        <div class="form-group">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" >{{ isset($typeReservation->description)?$typeReservation->description:old('description')}}</textarea>
        </div>
        <!-- / -->

        <hr>

        <!-- BOTON GUARDAR -->
        <button type="submit" class="btn btn-success mt-4">
            <i class="fas fa-save"></i>
            Guardar
        </button>
        <!-- / -->

    </form>
    <!-- FIN DEL FORMULARIO -->

@stop

@section('css')
    <link rel="stylesheet" href="../../css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')

@stop
