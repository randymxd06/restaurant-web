@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1>Agregar Mesa</h1>
    <a class="btn btn-primary mt-1" href="{{url('/tables')}}">
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
<form method="post" action="{{ url('/tables/store') }}">

    <!-- TOKEN -->
    @csrf

    <div class="form-row">
        <!-- Salon -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Salón:</label>
                <select class="custom-select mr-sm-2" id="living_room_id" name="living_room_id">
                    <option selected disabled>Choose...</option>
                    @foreach ($LivingRooms as $LivingRoom)
                        <option value="{{ $LivingRoom->id }}" {{(old('living_room_id') == $LivingRoom->id) ? 'selected' : ''}}>{{$LivingRoom->name}}</option>
                    @endforeach
                </select>
            </div>
        </div> 
        <!-- / -->
        
        <!--  Capacidad de personas -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Capacidad de personas</label>
                <input type="number" class="form-control" id="people_capacity" name="people_capacity" value="{{ isset($table->people_capacity)?$table->people_capacity:old('people_capacity') }}"/>
            </div>
        </div>
        <!-- / -->
    </div>

    <!-- Descripción -->
    <div class="form-group">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3" >{{ isset($table->description)?$table->description:old('description') }}</textarea>
    </div>
    <!-- / -->

    <!-- Estado -->
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="status"  name="status">
            <label class="custom-control-label" for="status">Estado</label>
        </div>
    </div>
    <!-- / -->
    <hr>
    <!-- Boton Guardar -->
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
