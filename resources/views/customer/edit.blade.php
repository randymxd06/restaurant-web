@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Editar Cliente | {{$customers->customer_id}}</h1>
    <a class="btn btn-primary mt-1" href="{{url('/customer')}}">
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
    <form method="post" action="{{ url('/customer/update/'.$customers->entity_id) }}">

        <!-- TOKEN -->
        @csrf

        {{method_field('PUT')}}

        <div class="row">

            <div class="form-group col-sm-12 col-md-4">
                <label class="form-label" for="first_name">Nombre</label>
                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="Escribe tu nombre" value="{{$customers->first_name}}">
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label class="form-label" for="last_name">Apellido</label>
                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Escribe tus apellidos" value="{{$customers->last_name}}">
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label class="form-label" for="identification">Cédula</label>
                <input class="form-control" type="text" name="identification" id="identification" placeholder="Escribe tu cédula" value="{{$customers->identification}}">
            </div>

            <div class="form-group col-sm-12 col-md-3">
                <label for="sex_id">Sexo</label>
                <select class="custom-select mr-sm-2" id="sex_id" name="sex_id">
                    <option selected disabled>Selecciona un sexo...</option>
                    @foreach ($sexs as $sex)
                        <option value="{{ $sex->id }}" {{( $customers->sex_id == $sex->id) ? 'selected' : ''}}>{{$sex->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-sm-12 col-md-3">
                <label for="civil_status_id">Estado Civil</label>
                <select class="custom-select mr-sm-2" id="civil_status_id" name="civil_status_id">
                    <option selected disabled>Selecciona un estado civil...</option>
                    @foreach ($civilStatus as $civilStatu)
                        <option value="{{ $civilStatu->id }}" {{( $customers->civil_status_id == $civilStatu->id) ? 'selected' : ''}}>{{$civilStatu->description}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-sm-12 col-md-3">
                <label for="nationality_id">Nacionalidad</label>
                <select class="custom-select mr-sm-2" id="nationality_id" name="nationality_id">
                    <option selected disabled>Selecciona una nacionalidad...</option>
                    @foreach ($nationalities as $nationality)
                        <option value="{{ $nationality->id }}" {{( $customers->nationality_id == $nationality->id) ? 'selected' : ''}}>{{$nationality->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-sm-12 col-md-3">
                <label for="customer_type_id">Tipo de cliente</label>
                <select class="custom-select mr-sm-2" id="customer_type_id" name="customer_type_id">
                    <option selected disabled>Selecciona un tipo de cliente...</option>
                    @foreach ($customerTypes as $customerType)
                        <option value="{{ $customerType->id }}" {{( $customers->customer_types_id == $customerType->id) ? 'selected' : ''}}>{{$customerType->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label class="form-label" for="email">Correo Electrónico</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Escribe tu correo electrónico" value="{{$customers->email}}">
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label class="form-label" for="phone">Teléfono</label>
                <input class="form-control" type="text" name="phone" id="phone" placeholder="Escribe un número de teléfono" value="{{$customers->phone}}">
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label class="form-label" for="birth_date">Fecha de nacimiento</label>
                <input class="form-control" type="date" name="birth_date" id="birth_date" placeholder="Escribe la fecha en que naciste" value="{{$customers->birth_date}}">
            </div>

        </div>

        <hr>
        <!-- Boton Guardar -->
        <button type="submit" class="btn btn-success mt-4">
            <i class="fas fa-save"></i>
            Guardar
        </button>
        <!-- / -->

    </form>
    <!-- FIN DEL FORMULARIO -->

@stop

@section('css')
    <link rel="stylesheet" href="../../css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')

@stop
