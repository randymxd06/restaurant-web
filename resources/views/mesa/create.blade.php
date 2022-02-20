@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1 class="mb-4">Mesas</h1>
    <hr>
@stop

@section('content')

 <!-- FORMULARIO -->
 <form method="POST" action="{{ url('/mesas/store') }}">

    {{-- TOKEN --}}
     @csrf

    {{-- SALON Y CAPACIDAD DE PERSONAS --}}
    <div class="form-row">

        {{-- SALON --}}
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Salón:</label>
                <select class="custom-select mr-sm-2" id="salon" name="salon">
                    <option selected disabled>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>

        {{-- CAPACIDAD DE PERSONAS --}}
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Capacidad de personas</label>
                <input type="number" class="form-control" id="people_capacity" name="people_capacity"/>
            </div>
        </div>

    </div>

    {{-- DESCRIPCION --}}
    <div class="form-group">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>

    {{-- ESTADO --}}
    <div class="form-group">
        <div class="custom-control custom-switch">
            <label class="custom-control-label" for="state">Estado</label>
            <input type="checkbox" class="custom-control-input" id="state" name="state">
        </div>
    </div>

    {{-- LINEA DIVISORA --}}
    <hr>

    {{-- BOTON GUARDAR --}}
    <button type="submit" class="btn btn-success mt-4">
        <i class="fas fa-save"></i>
        Guardar
    </button>

</form>
<!-- FIN DEL FORMULARIO -->

@stop

@section('css')
    /*<link rel="stylesheet" href="../../css/admin_custom.css">*/
{{--    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">--}}
    /*<style>*/
/*        .card-title{*/
/*            font-weight: bold !important*/
/*        }*/
/*    </style>*/
@stop

@section('js')
{{--    <script>--}}
{{--        $('#myModal').on('shown.bs.modal', function () {--}}
{{--            $('#myInput').trigger('focus')--}}
{{--        })--}}
{{--        Console.log('HOLA');--}}
{{--    </script>--}}
@stop
