@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Editar Producto | {{ $product -> name }} </h1>
    <a class="btn btn-primary mt-1" href="{{url('/products')}}">
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
<form method="post" action="{{ url('/products/update/'.$product->id) }}" enctype="multipart/form-data">
    <!-- TOKEN -->
    @csrf
    {{method_field('PUT')}}
    <div class="form-row">
        <!-- Nombre -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($product->name)?$product->name:old('name') }}">
            </div>
        </div>

        <!-- Imagen/Foto -->
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Imagén/Foto:</label>
                <div class="custom-file">
                    <input type="file" accept="image/*" class="custom-file-input form-control" id="image" name="image">
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
                    <input type="text" class="form-control" id="price" name="price" value="{{ isset($product->price)?$product->price:old('price') }}">
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
                    @foreach ($ProductCategories as $ProductCategory)
                        <option value="{{$ProductCategory->id}}" {{  ($product->products_categories_id == $ProductCategory->id) ? 'selected' : ''}} {{( old('products_categories_id') == $ProductCategory->id) ? 'selected' : ''}} >{{$ProductCategory->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>

    <!-- Descripcion -->
    <div class="form-group">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ isset($product->description)?$product->description:old('description') }}</textarea>
    </div>

    <!-- Estado -->
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="status" name="status" {{($product->status == true || $product->status == 1) ? 'checked' : ''}}>
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
