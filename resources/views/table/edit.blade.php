@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1 class="mb-4">Mesas</h1>
    <hr>
@stop

@section('content')

    <!-- FORMULARIO -->
    <form method="post" action="{{ url('/mesas/update/'.$table->id) }}">

        <!-- TOKEN -->
        @csrf

        {{method_field('PUT')}}

        {{-- SALON Y CAPACIDAD DE PERSONAS --}}
        <div class="form-row">

            {{-- SALON --}}
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label">Salón:</label>
                    <select class="custom-select mr-sm-2" id="living_room_id" name="living_room_id">
                        <option disabled>Choose...</option>
                        <option {{($table->living_room_id == 1) ? 'selected' : ''}} value="1">One</option>
                        <option {{($table->living_room_id == 2) ? 'selected' : ''}} value="2">Two</option>
                        <option {{($table->living_room_id == 3) ? 'selected' : ''}} value="3">Three</option>
                    </select>
                </div>
            </div>

            {{-- CAPACIDAD DE PERSONAS --}}
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label">Capacidad de personas</label>
                    <input type="number" class="form-control" id="people_capacity" name="people_capacity" value="{{$table->people_capacity}}"/>
                </div>
            </div>
        </div>

        {{-- DESCRIPCION --}}
        <div class="form-group">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{$table->description}}</textarea>
        </div>

        {{-- ESTADO --}}
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="status" name="status" {{($table->status == true || $table->status == 1) ? 'checked' : ''}}>
                <label class="custom-control-label" for="status">Estado</label>
            </div>
        </div>

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
    <link rel="stylesheet" href="../../css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')

@stop
