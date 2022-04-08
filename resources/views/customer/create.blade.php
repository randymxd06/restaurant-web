@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Agregar Cliente</h1>
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
    <form method="post" action="{{ url('/customer/store') }}">

        <!-- TOKEN -->
        @csrf

        <div class="form-row">

            <div class="form-group col-sm-12 col-md-6">
                <label class="form-label" for="first_name">Nombre:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <input class="form-control" type="text" name="first_name" id="first_name" placeholder="Escribe tu nombre">
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-6">
                <label class="form-label" for="last_name">Apellido:</label>
                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Escribe tus apellidos">
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label class="form-label" for="identification">Cédula:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-id-card"></i>
                        </span>
                    </div>
                    <input class="form-control" type="text" name="identification" id="identification" placeholder="Escribe tu cédula">
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label for="civil_status_id">Estado Civil:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-ring"></i>
                        </span>
                    </div>
                    <select class="custom-select mr-sm-2" id="civil_status_id" name="civil_status_id">
                        <option selected disabled>Selecciona un estado civil...</option>
                        @foreach ($civilStatus as $civilStatu)
                            <option value="{{ $civilStatu->id }}" {{( old('civil_status_id') == $civilStatu->id) ? 'selected' : ''}}>{{$civilStatu->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label for="customer_type_id">Tipo de cliente:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user-tag"></i>
                        </span>
                    </div>
                    <select class="custom-select mr-sm-2" id="customer_type_id" name="customer_type_id">
                        <option selected disabled>Selecciona un tipo de cliente...</option>
                        @foreach ($customerTypes as $customerType)
                            <option value="{{ $customerType->id }}" {{( old('customer_type_id') == $customerType->id) ? 'selected' : ''}}>{{$customerType->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label for="sex_id">Sexo:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-venus-mars"></i>
                        </span>
                    </div>
                    <select class="custom-select mr-sm-2" id="sex_id" name="sex_id">
                        <option selected disabled>Selecciona un sexo...</option>
                        @foreach ($sexs as $sex)
                            <option value="{{ $sex->id }}" {{( old('$sex') == $sex->id) ? 'selected' : ''}}>{{$sex->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label for="nationality_id">Nacionalidad:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-flag"></i>
                        </span>
                    </div>
                    <select class="custom-select mr-sm-2" id="nationality_id" name="nationality_id">
                        <option selected disabled>Selecciona una nacionalidad...</option>
                        @foreach ($nationalities as $nationality)
                            <option value="{{ $nationality->id }}" {{( old('nationality_id') == $nationality->id) ? 'selected' : ''}}>{{$nationality->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label class="form-label" for="birth_date">Fecha de nacimiento:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-birthday-cake"></i>
                        </span>
                    </div>
                    <input class="form-control" type="date" name="birth_date" id="birth_date" placeholder="Escribe la fecha en que naciste">
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-6">
                <label class="form-label" for="email">Correo Electrónico:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-at"></i>
                        </span>
                    </div>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Escribe tu correo electrónico">
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-6">
                <label class="form-label" for="phone">Teléfono:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                    </div>
                    <input class="form-control" type="text" name="phone" id="phone" placeholder="Escribe un número de teléfono">
                </div>
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
