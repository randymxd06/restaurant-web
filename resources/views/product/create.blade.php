@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1 class="mb-4">Agregar Productos</h1>
    <hr>
@stop

@section('content')
<!-- Formulario Producto -->
<form method="post" action="{{ url('/productos/store') }}" enctype="multipart/form-data">
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
        <!-- Imagen/Foto -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Imagén/Foto:</label>
                <div class="custom-file">
                    <input type="file" accept="image/*" class="custom-file-input" id="img" name="img">
                    <label class="custom-file-label" for="inputGroupFile01">Seleccione Imagén</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <!-- Precio -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Precio:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">RD$</span>
                    </div>
                    <input type="text" class="form-control" id="price" name="price">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categoria -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Catergoria:</label>
                <select class="custom-select mr-sm-2" id="products_categories_id" name="products_categories_id">
                    <option selected disabled>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Descripcion -->
    <div class="form-group">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
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
