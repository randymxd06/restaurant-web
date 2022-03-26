@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1 class="mb-4">Editar Caja | #{{$box->id}}</h1>
    <a class="btn btn-primary mt-1" href="{{url('/box')}}">
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
    <form method="post" action="{{ url('/box/update/'.$box->id) }}">

        <!-- TOKEN -->
        @csrf
        <!-- / -->

        {{method_field('PUT')}}

        <div class="row">

            <div class="form-group col-sm-4">
                <label class="form-label" for="start_time">Hora de inicio</label>
                <input class="form-control" type="time" name="start_time" id="start_time" value="{{$boxesHistory->start_time}}">
            </div>

            <div class="form-group col-sm-4">
                <label class="form-label" for="end_time">Hora de cierre</label>
                <input class="form-control" type="time" name="end_time" id="end_time" value="{{$boxesHistory->end_time}}">
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label class="form-label" for="device_use">Dispositivo</label>
                <select class="custom-select mr-sm-2" id="device_use" name="device_use">
                    <option selected disabled>Selecciona un dispositivo...</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Celular">Celular</option>
                    <option value="Computadora">Computadora</option>
                </select>
            </div>

        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="status" name="status">
                <label class="custom-control-label" for="status" {{($box->status == true || $box->status == 1) ? 'checked' : ''}}>Estado</label>
            </div>
        </div>

        <hr>

        <button type="submit" class="btn btn-success mt-4">
            <i class="fas fa-save"></i>
            Guardar
        </button>

    </form>
    <!-- FIN DEL FORMULARIO -->

@stop

@section('css')
    <link rel="stylesheet" href="../../css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')

@stop
