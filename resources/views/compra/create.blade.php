@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
    <h1>Realizar Compra de Ingredientes</h1>
    <a class="btn btn-primary mt-1" href="{{url('/compras')}}">
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
    <form action="{{url('/compras/store')}}" method="post" >

        <!-- TOKEN -->
        @csrf


        
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
