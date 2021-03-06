@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1 class="mb-4">Crear Categoria</h1>
    <a class="btn btn-primary mt-1" href="{{url('/product_category')}}">
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
<form autocomplete="off" method="post" action="{{ url('/product_category/store') }}">

    <!-- TOKEN -->
    @csrf

    <div class="form-row">

        <!-- Nombre -->
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <label class="form-label">Nombre:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-tag"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Escribe el nombre de la categoría del producto" value="{{ isset($productCategory->name)?$productCategory->name:old('name') }}">
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-2">
            <!-- Descripcion -->
            <div class="form-group">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ isset($productCategory->description)?$productCategory->description:old('description') }}</textarea>
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
