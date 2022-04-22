@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<section class="content">

    <div class="card container" style="border-radius: 10px">

        <p class="my-2" style="font-size: 25px">Accesos directos</p>

        <div class="row">

            {{-- PEDIDOS --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success container">
                    <a href="{{ url('/caja/create') }}" class="small-box-footer py-5">
                        <div class="inner">
                            <h3 class="text-center">Pedidos</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-bag mt-3"></i>
                        </div>
                    </a>
                </div>
            </div>

            {{-- RESERVACIONES --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning container">
                    <a href="{{ url('/reservation') }}" class="small-box-footer py-5">
                        <div class="inner">
                            <h3 class="text-center">Reservaciones</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-alt mt-3"></i>
                        </div>
                    </a>
                </div>
            </div>

            {{-- COCINA --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info container">
                    <a href="{{ url('/cocina') }}" class="small-box-footer py-5">
                        <div class="inner">
                            <h3 class="text-center">Cocina</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hat-chef mt-3"></i>
                        </div>
                    </a>
                </div>
            </div>

            {{-- REPORTES --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary container">
                    <a href="#" class="small-box-footer py-5">
                        <div class="inner">
                            <h3 class="text-center">Reportes</h3>
                        </div>
                        <div class="icon">
                            <i class="far fa-file-chart-line mt-3"></i>
                        </div>
                    </a>
                </div>
            </div>

        </div>

    </div>

    <div class="card container" style="border-radius: 10px">

        <p class="my-2" style="font-size: 25px">Ordenes Activas</p>

        <table class="my-2 table table-striped table-hover">

            <thead>
                <tr style="font-weight: bold">
                    <td>Código Orden</td>
                    <td>Código Mesa</td>
                    <td>Cliente</td>
                    <td>Tipo de Orden</td>
                    <td>Estado</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>43405</td>
                    <td>1</td>
                    <td>Randy Garcia</td>
                    <td>Orden de caja</td>
                    <td class="text-success">Activa</td>
                </tr>
                <tr>
                    <td>43406</td>
                    <td>2</td>
                    <td>Randy Garcia</td>
                    <td>Orden de caja</td>
                    <td class="text-success">Activa</td>
                </tr>
                <tr>
                    <td>43407</td>
                    <td>3</td>
                    <td>Randy Garcia</td>
                    <td>Orden de caja</td>
                    <td class="text-success">Activa</td>
                </tr>
            </tbody>

        </table>

    </div>


</section>

@stop

@section('css')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')
    @if(session('error-box')=='ok')
    <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Error al acceder a Venta!',
                text: 'Tu usuario no esta realacionado a una terminal de uso',
                showConfirmButton: true,
                confirmButtonText: 'Cerrar'
            })
        </script>
    @endif
@stop
