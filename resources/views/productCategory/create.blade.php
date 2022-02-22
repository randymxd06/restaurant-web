@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1 class="mb-4">Categorias</h1>
    <hr>
@stop

@section('content')
<!-- Formulario Producto -->
<form method="post" action="{{ url('/Categorias/store') }}">
    <!-- TOKEN -->
    @csrf
    <div class="form-row">
        <!-- Nombre -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <!-- Descripcion -->
            <div class="form-group">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>  
        </div>
    </div>
    <!-- Estado -->
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="status"  name="status">
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
