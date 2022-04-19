@extends('adminlte::page')

@section('title', 'Recetas')

@section('content_header')
    <h1 class="mb-4">Editar Receta | #{{$recipes->id}}</h1>
    <a class="btn btn-primary mt-1" href="{{url('/recipes')}}">
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

    <!-- Formulario Ingrediente -->
    <form action="{{ url('/recipes/update/'.$recipes->id) }}" method="post">

        <!-- TOKEN -->
        @csrf

        {{method_field('PUT')}}

        <div class="row">

            <!-- PRODUCTO -->
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label">Producto:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-person-booth "></i></span>
                        </div>
                        <select class="custom-select mr-sm-2" id="product_id" name="product_id">
                            <option selected="" disabled="">Selecciona un producto</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}" {{( $recipes->product_id == $product->id) ? 'selected' : ''}}>{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- / -->

            <!-- NOMBRE DEL INGREDIENTE -->
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label" for="name">Nombre de la receta:</label>
                    <input class="form-control" id="name" name="name" placeholder="Escribe el nombre del ingrediente" value="{{$recipes->name}}">
                </div>
            </div>

        </div>

        <!-- DESCRIPCION -->
        <div class="form-group">
            <label class="form-label" for="instructions">Instrucciones:</label>
            <textarea class="form-control" id="instructions" name="instructions" rows="3">{{ isset($recipes->instructions)?$recipes->instructions:old('description') }}</textarea>
        </div>

        <!-- ESTADO -->
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="status" name="status" {{($recipes->status == true || $recipes->status == 1) ? 'checked' : ''}}>
                <label class="custom-control-label" for="status">Estado</label>
            </div>
        </div>

        <hr>

        <!-- BOTON ENVIAR -->
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
    @include('sweetalert::alert')
@stop
