@extends('adminlte::page')

@section('title', 'Cocina')

@section('content_header')
<h1>Cocina</h1>
<div class="card card-outline card-warning">
    <div class="card-header">
        <h3 class="card-title">Información</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <p>Las órdenes con un encabezado <span class="badge bg-primary text-dark">AZUL</span>, son órdenes para mesas (Normales).</p>
        <p>Las órdenes con un encabezado <span class="badge bg-gray text-dark">GRIS</span>, son órdenes para llevar (Delivery/Takeouts).</p>
        <p>Al hacer un clic sobre un orden, este pasará a estado trabajando/cocinando y la se pondrá en color <span class="badge bg-orange text-ligth">NARANJA</span>.</p>
        <p>Al hacer un clic sobre un orden en estado trabajando-NARANJA. este se pondrá en color <span class="badge bg-success text-dark">VERDE</span> y al volver hacer clic la orden se finalziara. </p>
    </div>
</div>
@stop

@section('content')
<div class="content-kitchen content-wrapper kanban">
    <section class="content pb-3">
        <div class="container-fluid h-100">
            <!-- Orden -->
            @foreach($orders as $o)
            <div class="card card-row card-primary" id="order-{{$o->id}}">
                <div class="card-header order-header">
                    <div class="order-title">
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-utensils"></i>
                        </a>
                        <h3 class="card-title">
                            Orden #<strong>{{ $o->id }}</strong> <br>
                            Mesa <strong>{{ $o->table_id }}</strong> <br>
                            Mesero: <strong>name</strong>
                        </h3>
                    </div>
                    <div class="order-time">
                        <button onclick="changeStatus({{ $o->id }})" class="btn btn-tool" id="button-{{$o->id}}">
                            <i class="fas fa-check"></i>
                        </button>
                        <form method="post" action="{{ url('/cocina/update/'.$o->id)}}" class="d-none" id="form-{{$o->id}}">
                            <!-- TOKEN -->
                            @csrf
                            {{method_field('PUT')}}
                            <input type="checkbox" class="custom-control-input d-none" id="status"  name="status" checked>
                            <button type="submit" class="btn btn-tool">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                        <p class="order-timer" id="order-timer">
                            00:00:00
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Productos de la Orden -->
                    @foreach($order_products as $op)
                        @if($op->order_id == $o->id)
                            <div class="card card-light card-outline">
                                <div class="card-header">
                                    <div class="orden-producto-info">
                                        <i class="fas fa-pizza-slice"></i>
                                        @foreach($products as $p)
                                            @if($p->id == $op->product_id)
                                            <p class="card-title">{{ $p->name }}</p>
                                            @endif
                                        @endforeach
                                        <span class="badge bg-primary text-dark">{{ $op->quantity }}</span>
                                    </div> 
                                    <div class="card-tools">
                                        <!-- <a href="#" class="btn btn-tool btn-link">#1</a> -->
                                        <a href="#" class="btn btn-tool">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!-- / -->
                    <!-- <div class="card card-light card-outline">
                        <div class="card-header">
                            <div class="orden-producto-info">
                                <i class="fas fa-pizza-slice"></i>
                                <p class="card-title">Pizza Grande Margarita</p>
                                <span class="badge bg-primary text-dark">02</span>
                            </div> 
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-link">#1</a> 
                                <a href="#" class="btn btn-tool">
                                    <i class="fas fa-check"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body" style="display: none;">
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                Aenean commodo ligula eget dolor. Aenean massa.
                                Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus.
                            </p>
                        </div>
                    </div> -->
                    <!-- / productos de la orden -->
                </div>
            </div>
            <!-- /Orden -->
            @endforeach
        </div>
    </section>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
<style>
    @include('cocina.includes.style');
</style>
@stop
@section('js')
    @include('sweetalert::alert')
    <script>
        let time = 10; // Segundos
        // let orderTimer;

        function changeStatus(id){
            let element = document.getElementById("order-"+id);
            
            if(element.classList.contains("card-primary")){
                element.classList.add("card-orange");
                element.classList.remove("card-primary");
                //Cada 1 segundo se crea un nuevo elemento
                return;
            }

            if(element.classList.contains("card-orange")){
                element.classList.add("card-success");
                element.classList.remove("card-orange");
                document.getElementById("form-"+id).classList.remove('d-none');
                document.getElementById("button-"+id).classList.add('d-none');
                return;
            }
            
            if(element.classList.contains("card-success")){
                element.classList.add("card-primary");
                element.classList.remove("card-success");
                return;
            }
        }
    </script>
@stop
