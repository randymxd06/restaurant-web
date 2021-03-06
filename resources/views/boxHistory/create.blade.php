@extends('adminlte::page')

@section('title', 'Caja')

@section('content_header')
    <h1>Agregar Caja</h1>
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

    <div>

        <form action="{{url('box/store')}}" method="post">

            @csrf

            <div class="row">

                <div class="form-group col-sm-12 col-md-4">
                    <label class="form-label" for="start_time">Hora de inicio</label>
                    <input class="form-control" type="time" name="start_time" id="start_time">
                </div>

                <div class="form-group col-sm-12 col-md-4">
                    <label class="form-label" for="end_time">Hora de cierre</label>
                    <input class="form-control" type="time" name="end_time" id="end_time">
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

                <div class="form-group col-sm-12 col-md-4">
                    <label for="user_id">Usuario</label>
                    <select class="custom-select mr-sm-2" id="user_id" name="user_id">
                        <option selected disabled>Selecciona un usuario...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{( old('user_id') == $user->id) ? 'selected' : ''}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="form-group mt-4">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="status" name="status">
                    <label class="custom-control-label" for="status">Estado</label>
                </div>
            </div>

            <hr>

            <button type="submit" class="btn btn-success mt-4">
                <i class="fas fa-save"></i>
                Guardar
            </button>

        </form>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="../../css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')

@stop
