@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1>Mesas</h1>
    <br>
    <hr>
    <br>
@stop

@section('content')
 <!--  -->
 <form>
    <div class="form-row">
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Salón:</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                </select>  
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="form-label">Capacidad de personas</label>
                <input class="form-control" id="people_capacity"/>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" id="description" rows="3"></textarea>
    </div>
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">Estado</label>
        </div>
    </div>

    <hr>
    <br>
    <button class="btn btn-success">
        <i class="fas fa-save"></i>
        Guardar
    </button>
</form>
<!--  -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    <style>
        .card-title{
            font-weight: bold !important
        }
    </style>
@stop

@section('js')
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
        Console.log('HOLA');
    </script>
@stop
