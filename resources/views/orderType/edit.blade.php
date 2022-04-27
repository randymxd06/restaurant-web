@extends('adminlte::page')

@section('title', 'Tipo de ordenes')

@section('content_header')
    <h1>Editar tipo de orden | {{ $orderTypes->name }} </h1>
    <a class="btn btn-primary mt-1" href="{{url('order_type/')}}">
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

    <!-- FORMULARIO TIPO DE ORDEN -->
    <form autocomplete="off" method="post" action="{{ url('/order_type/update/'.$orderTypes->id) }}">

        <!-- TOKEN -->
        @csrf

        {{method_field('PUT')}}

        <div class="form-row">

            <!-- NOMBRE -->
            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <label class="form-label">Nombre:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-tag"></i>
                        </span>
                        </div>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Escribe el nombre del tipo de orden" value="{{$orderTypes->name}}">
                    </div>
                </div>
            </div>
        </div>

        <!-- DESCRIPCION -->
        <div class="form-row">
            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <label class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ isset($orderTypes->description)?$orderTypes->description:old('description') }}</textarea>
                </div>
            </div>
        </div>

        <!-- ESTADO -->
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="status"  name="status" {{($orderTypes->status == true || $orderTypes->status == 1) ? 'checked' : ''}}>
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
