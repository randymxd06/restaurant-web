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

            {{-- PEDIDOS RAPIDOS --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger container">
                    <a href="/order_screen/create" class="small-box-footer py-5">
                        <div class="inner">
                            <h3 class="text-center">Pedidos Rapidos</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-drumstick-bite mt-3"></i>
                        </div>
                    </a>
                </div>
            </div>

        </div>

    </div>

    <div>
        <canvas id="myChart" width="100" height="30"></canvas>
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

                @foreach($activeOrders as $activeOrder)
                    <tr>
                        <td>{{$activeOrder->id}}</td>
                        <td>{{$activeOrder->table_id}}</td>
                        <td>{{$activeOrder->first_name}} {{$activeOrder->last_name}}</td>
                        <td>{{$activeOrder->order_types_name}}</td>
                        <td class="text-success">Activa</td>
                    </tr>
                @endforeach

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

    {{-- SCRIPT DEL GRAFICO --}}
    <script>

        let chartData = @json($chartData);
        var namesArray = [];
        var valueArray = [];

        chartData.forEach(e => {
            namesArray.push(e.name);
            valueArray.push(e.quantity);
        })

        $(function () {

            let ctx = document.getElementById("myChart").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: namesArray,
                    datasets: [{
                        label: 'Top 5 productos más vendidos',
                        data: valueArray,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });

    </script>

@stop
