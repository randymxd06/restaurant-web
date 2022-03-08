@extends('adminlte::page')

@section('title', 'Salones')

@section('content_header')
    <h1>Editar Salon | {{ $livingRoom->name }} </h1>
    <a class="btn btn-primary mt-1" href="{{url('/livingrooms')}}">
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
<!-- Formulario Producto -->
<form method="post" action="{{ url('/livingrooms/update/'.$livingRoom->id)}}">
    <!-- TOKEN -->
    @csrf
    {{method_field('PUT')}}
    <div class="form-row">
        <!-- Nombre -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($livingRoom->name)?$livingRoom->name:old('name') }}">
            </div>
        </div>
        <!--  Capacidad de Mesas -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Capacidad de mesas</label>
                <input type="number" class="form-control" id="tables_capacity" name="tables_capacity" value="{{ isset($livingRoom->tables_capacity)?$livingRoom->tables_capacity:old('tables_capacity') }}"/>
            </div>
        </div>
        <!-- / -->
    </div>

    <!-- Descripcion -->
    <div class="form-group">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ isset($livingRoom->description)?$livingRoom->description:old('description') }}</textarea>
    </div>  
    <!-- Estado -->
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="status"  name="status" {{($livingRoom->status == true || $livingRoom->status == 1) ? 'checked' : ''}}>
            <label class="custom-control-label" for="status">Estado</label>
        </div>
    </div>
    <hr>
    <!-- Boton Enviar -->
    <button type="submit" class="btn btn-success mt-4">
        <i class="fas fa-save"></i>
        Guardar
    </button>
</form>
<!-- /Formulario -->
@stop

@section('css')
<link rel="stylesheet" href="../../css/admin_custom.css">
<link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')

@stop
