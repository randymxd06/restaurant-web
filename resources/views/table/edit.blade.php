@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1 class="mb-4">Editar Mesa | #{{$table->id}}</h1>
    <a class="btn btn-primary mt-1" href="{{url('/tables')}}">
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

    <!-- FORMULARIO -->
    <form method="post" action="{{ url('/tables/update/'.$table->id) }}">

        <!-- TOKEN -->
        @csrf
        <!-- / -->

        {{method_field('PUT')}}

        <div class="form-row">
            <!--  SALON  -->
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label">Salón:</label>
                    <select class="custom-select mr-sm-2" id="living_room_id" name="living_room_id">
                        <option disabled>Choose...</option>
                        @foreach ($LivingRooms as $LivingRoom)
                            <option option value="{{ $LivingRoom->id }}" {{($table->living_room_id == $LivingRoom->id) ? 'selected' : ''}}>{{$LivingRoom->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- CAPACIDAD DE PERSONAS -->
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label">Capacidad de personas</label>
                    <input type="number" class="form-control" id="people_capacity" name="people_capacity" placeholder="Escribe la capacidad de personas" value="{{$table->people_capacity}}"/>
                </div>
            </div>
        </div>

        <!--  DESCRIPCION  -->
        <div class="form-group">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{$table->description}}</textarea>
        </div>

        <!-- ESTADO  -->
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="status" name="status" {{($table->status == true || $table->status == 1) ? 'checked' : ''}}>
                <label class="custom-control-label" for="status">Estado</label>
            </div>
        </div>

        <hr>

        <!--  BOTON GUARDAR  -->
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
