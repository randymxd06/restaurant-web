@extends('adminlte::page')

@section('title', 'Ingredientes')

@section('content_header')
    <h1>Agregar Ingredientes</h1>
    <a class="btn btn-primary mt-1" href="{{url('/ingredients')}}">
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
    <form action="{{url('/ingredients/store')}}" method="post" >

        <!-- TOKEN -->
        @csrf

        <div class="row">

            <!-- Name -->
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label" for="name">Nombre</label>
                    <input class="form-control" id="name" name="name" placeholder="Escribe el nombre del ingrediente">
                </div>
            </div>

            <!-- TIPO DE ALMACEN -->
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label">Tipo de almacén:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                        </div>
                        <select class="custom-select mr-sm-2" id="warehouse_type_id" name="warehouse_type_id">
                            <option selected="" disabled="">Selecciona un tipo de almacen</option>
                            @foreach($warehouseTypes as $warehouseType)
                                <option value="{{$warehouseType->id}}">{{$warehouseType->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- / -->

        </div>

        <!-- Descripcion -->
        <div class="form-group">
            <label class="form-label" for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ isset($product->description)?$product->description:old('description') }}</textarea>
        </div>

        <!-- Estado -->
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="status" name="status">
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
    @include('sweetalert::alert')
@stop
