@extends('adminlte::page')

@section('title', 'Terminal')

@section('content_header')
    <h1 class="mb-4">Editar Terminal | #{{$box->id}}</h1>
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
            <div class="form-group col-sm-12 col-md-12">
                <label class="form-label" for="device_use">Dispositivo</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-desktop"></i>
                        </span>
                    </div>
                    <select class="custom-select mr-sm-2" id="device_use" name="device_use">
                        <option selected disabled>Selecciona un dispositivo...</option>
                        <option value="Tablet" {{( $box->device_use == 'Tablet') ? 'selected' : ''}}>Tablet</option>
                        <option value="Celular" {{( $box->device_use == 'Celular') ? 'selected' : ''}}>Celular</option>
                        <option value="Computadora" {{( $box->device_use == 'Computadora') ? 'selected' : ''}}>Computadora</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-12">
                <label for="user_id">Usuario</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <select class="custom-select mr-sm-2" id="user_id" name="user_id">
                        <option selected disabled>Selecciona un usuario...</option>
                        @foreach ($users as $user)
                            <option option value="{{ $user->id }}" {{( $box->user_id == $user->id) ? 'selected' : ''}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="status" name="status" {{($box->status == true || $box->status == 1) ? 'checked' : ''}}>
                <label class="custom-control-label" for="status" >Estado</label>
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
