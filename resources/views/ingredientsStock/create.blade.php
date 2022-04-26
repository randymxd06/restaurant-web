@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
    <h1>Realizar Compra de Ingredientes</h1>
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
    <form action="{{url('/ingredients-stock/store')}}" method="post" >

        <!-- TOKEN -->
        @csrf

        <!-- Ingrediente -->
        <div class="row">
            <div class="col-sm-6 mb-6">
                <div class="form-group">
                    <label class="form-label">Ingrediente:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lemon "></i></span>
                        </div>
                        <select class="custom-select mr-sm-2" id="ingredient_id" name="ingredient_id">
                            <option selected="" disabled="">Selecciona un Ingredientes...</option>
                            @foreach($ingredients as $ingredient)
                                <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- Cantidad -->
            <div class="col-sm-3 mb-3">
                <div class="form-group">
                    <label class="form-label">Cantidad:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lemon "></i></span>
                        </div>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Escribe la cantidad" value="" >
                    </div>
                </div>
            </div>
            <!-- Unidad de medida -->
            <div class="col-sm-3 mb-3">
                <div class="form-group">
                    <label class="form-label">Unidad de medidas:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lemon "></i></span>
                        </div>
                        <select class="custom-select mr-sm-2" id="unit_measurement_id" name="unit_measurement_id">
                            <option selected="" disabled="">Selecciona una unidad de medida...</option>
                            @foreach($units_measurement as $unidad)
                                <option value="{{$unidad->id}}">{{$unidad->name}} - {{$unidad->symbol}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Fecha de llegada -->
            <div class="col-12 col-sm-6 mb-6">
                <div class="form-group">
                    <label class="form-label">Fecha de llegada:</label>
                    <div class="input-group date">
                        <input name="arrival_date" id="arrival_date" type="date" class="form-control"/>
                    </div>
                </div>
            </div>

            <!-- Fecha de expiración -->
            <div class="col-12 col-sm-6 mb-6">
                <div class="form-group">
                    <label class="form-label">Fecha de expiración:</label>
                    <div class="input-group date">
                        <input name="expiration_date" id="expiration_date" type="date" class="form-control"/>
                    </div>
                </div>
            </div>
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
