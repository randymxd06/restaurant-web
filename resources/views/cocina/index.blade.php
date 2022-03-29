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
        <p>Al hacer un clic sobre un orden, este pasará a estado trabajando/cocinando y la se pondrá en color <span class="badge bg-warning text-dark">NARANJA</span>.</p>
        <p>Al hacer un clic sobre un orden en estado trabajando-NARANJA. este se pondrá en color <span class="badge bg-success text-dark">VERDE</span> y estado finalizado y automáticamente se quitara de la orden luego de 30s. </p>
    </div>
</div>
@stop

@section('content')
<div class="content-kitchen content-wrapper kanban">
    <section class="content pb-3">
        <div class="container-fluid h-100">
            <!-- Orden -->
            @foreach($orders as $o)
            <div class="card card-row card-primary">
                <div class="card-header order-header">
                    <div class="order-title">
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-utensils"></i>
                        </a>
                        <h3 class="card-title">
                            Orden # <strong>000</strong> -
                            Mesa <strong>00</strong>
                        </h3>
                    </div>
                    <div class="order-time">
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-check"></i>
                        </a>
                        <p class="">
                            00:00:00
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Productos de la Orden -->
                    <div class="card card-light card-outline">
                        <div class="card-header">
                            <div class="orden-producto-info">
                                <i class="fas fa-pizza-slice"></i>
                                <p class="card-title">Refresco - Coca Cola</p>
                                <span class="badge bg-primary text-dark">01</span>
                            </div> 
                            <div class="card-tools">
                                <!-- <a href="#" class="btn btn-tool btn-link">#1</a> -->
                                <a href="#" class="btn btn-tool">
                                    <i class="fas fa-check"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- / -->
                    <div class="card card-light card-outline">
                        <div class="card-header">
                            <div class="orden-producto-info">
                                <i class="fas fa-pizza-slice"></i>
                                <p class="card-title">Pizza Grande Margarita</p>
                                <span class="badge bg-primary text-dark">02</span>
                            </div> 
                            <div class="card-tools">
                                <!-- <a href="#" class="btn btn-tool btn-link">#1</a> -->
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
                    </div>
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
    .content-kitchen{
        margin: 0 !important;
        padding-top: 5px;
        min-height: calc(100vh - calc(3.5rem + 1px) - calc(8.5rem + 1px)) !important;
        height: 100px !important;

    }
    .container-fluid, .content-wrapper .content{
        padding: 0 !important;
        margin: 0 !important;
    }
    .content-kitchen.content-wrapper.kanban{
        margin: 0 10px !important;
        padding: 0 !important;
    }

    .orden-producto-info, .order-title {
        margin: 0;
        float: left;
        display: flex;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
    }
    .orden-producto-info p {
        margin: 0 5px;
    }
    .order-header{
        display: flex;
    }
    .order-time{
        margin: 0;
        float: right;
        text-align: center;
        flex: 0 0 25%;
        max-width: 25%;
    }
    .order-title{
        flex: 0 0 75%;
        max-width: 75%;
    }
    .order-title i{
        font-size: 30px;
        margin-right: 10px;
    }
</style>
@stop

@section('js')
    <script>Console.log('HOLA');</script>
@stop
