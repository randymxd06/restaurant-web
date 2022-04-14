@extends('adminlte::page')

@section('title', 'Venta | Toma de pedido')

@section('content_header')
<nav class="main-header navbar-category navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="fas fa-arrow-left"></i>
                    <!-- <span class="sr-only">Toggle navigation</span> -->
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
                <span class="sr-only">Toggle navigation</span>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
            <a class="nav-link" href="#" role="button">
                <i class="fas fa-receipt"></i>
            </a>
        </li>
        <li class="nav-item dropdown show">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                    <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <span class="dropdown-item dropdown-header">Configuración</span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-toggle="modal" data-target="#tableModal">
                    <i class="fas fa-chair mr-2"></i> Seleccionar mesa
                    <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#customersModal">
                    <i class="far fa-user mr-2"></i> Seleccionar cliente
                    <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-percent mr-2"></i> Aplicar descuento
                    <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i>Reasignar empleado
                    <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                </a>
                <!-- <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a> -->
                <!-- <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
            </div>
        </li>
        <!-- <li class="nav-link">
            <a href="#" role="button">
            <i class="fas fa-ellipsis-v"></i>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- Main Sidebar Category Container -->
<aside class="main-sidebar sidebar-category main-sidebar sidebar-dark-primary elevation-4">
    <h1 class="brand-link">
        <span class="brand-text font-weight-light ">
        <b>Categorías</b>
        </span>
    </h1>
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav>
        <!-- Categorias -->
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <!-- Titulo -->
        <li class="nav-header"> </li>
        <!-- / -->

        <!-- Ejemplo -->
        <!-- <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
            Entradas
            <span class="right badge badge-danger">New</span>
            </p>
        </a>
        </li> -->
        <!-- / -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                    Todas
                </p>
            </a>
        </li>
        <!-- Categoria -->
        @foreach( $productCategories as $productCategory )
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tag"></i>
                <p>
                    {{ $productCategory->name }}
                </p>
            </a>
        </li>
        @endforeach
        <!-- / -->

        </ul>
        <!-- /. Categorias -->
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<!-- Tabs in Mobil -->
<div class="tabs-menu-div card card-dark  card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="tabs-menu nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="Products-tab" data-bs-toggle="tab" data-bs-target="#Products" type="button" role="tab" aria-controls="Products" aria-selected="false">Productos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="invoice-tab" data-bs-toggle="tab" data-bs-target="#invoice" type="button" role="tab" aria-controls="invoice" aria-selected="false">Facturar</button>
            </li>
        </ul>
    </div>
</div>
<!-- / -->
@stop

@section('content')
<div class="tab-content" id="myTabContent">
    <!-- Productos -->
    <div class="tab-pane fade show active" id="Products" role="tabpanel" aria-labelledby="Products-tab">
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <!-- Card -->
            @foreach($products as $p)
                <button onclick="addProduct({{$p}})" class="col mb-3">
                    <div class="card h-100">
                        @if (!empty($p->image))
                        <img src="{{ asset('storage').'/'.$p->image }}" class="card-img-top" alt="...">
                        @else
                        <img src="{{URL::asset('images/daraguma-icon.png')}}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <p class="card-text"> {{ $p -> name }} </p>
                            <span class="badge bg-light text-dark">RD$ {{ number_format($p->price, 2, '.', ',') }}</span>
                        </div>
                    </div>
                </button>
            @endforeach
            <!-- /Card -->
        </div>
    </div>
    <!-- /Productos-->

    <!-- Informacion de la orden -->
    <div class="tab-pane fade " id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
        <aside class="control-sidebar control-sidebar-light order-sidebar">
            <!-- Ordenes -->
            <div class="order-header tableFixHead">
                <table class="order-products-head table table-striped">
                    <thead>
                        <tr>
                            <th>Empleado: </th>
                            <td colspan="3">{{{ Auth::user()->name }}}</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Caja:</strong>  <span>#{{ $box->id }}</span>
                            </td>
                            <th>Mesa:</th>
                            <td class="id-mesa" id="id-mesa" colspan="2">Sin mesa</td>
                        </tr>
                        <tr>
                            <th>Cliente: </th>
                            <td class="customer-id" id="customer-id" colspan="3">
                                Sin Cliente
                            </td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <th>Qty.</th>
                            <th>Precio</th>
                            <th>
                                <i class="far fa-trash-alt"></i>
                            </th>
                        </tr>
                    </thead>
                    <!-- Detalles -->
                    <tbody id="add-products">

                    </tbody>
                </table>
                <div class="order-footer">
                    <table class="order-details table table-borderless">
                        <tr>
                            <td colspan="4">
                                <!-- Formulario -->
                                <form method="post" action="{{ url('/caja/store') }}">
                                    <!-- TOKEN -->
                                    @csrf
                                    <input hidden type="number" name="user_id" id="user_id" value="{{{ Auth::user()->id }}}">
                                    <input hidden type="number" name="box_id" id="box_id" value="1">
                                    <input hidden type="number" name="customer_id" id="customer_id" value="{{old('customer_id')}}">
                                    <input hidden type="number" name="table_id" id="table_id" value="{{old('table_id')}}">
                                    <input hidden type="text" name="total_order" id="total_order" value="{{old('total_order')}}">

                                    <input hidden type="text" name="products" id="products" value="{{old('products')}}">
                                    <!-- button -->
                                    <button class="btn btn-success btn-block">
                                        <i class="fas fa-receipt"></i>
                                        Enviar
                                    </button>
                                    <!-- /button -->
                                </form>
                                <!-- /Formulario -->
                            </td>
                        </tr>
                        <tr>
                            <th>Subtotal</th>
                            <td>RD$</td>
                            <td colspan="2" name="order-subtotal" id="order-subtotal">0.00</td>
                        </tr>
                        <tr>
                            <th>Descuento</th>
                            <td>%</td>
                            <td colspan="2" name="order-descuento" id="order-descuento">00</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>RD$</td>
                            <td colspan="2" name="order-total" id="order-total">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="order-btn d-grid gap-2 d-flex justify-content-end">
                                    <!-- button -->
                                    <!-- <button class="btn btn-dark">
                                        <i class="fas fa-trash"></i>
                                    </button> -->
                                    <a class="btn btn-dark d-flex align-items-center" href="{{url('/caja/create')}}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <!-- /button -->
                                    <button class="btn btn-success btn-lg" disabled>
                                        <i class="fas fa-cash-register"></i>
                                        Facturar
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /Ordenes -->
        </aside>
    </div>
    <!--  -->
</div>

<!-- Modals -->
@include('caja.includes.modals')

@stop

@section('css')
    
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    <style>
        @include('caja.includes.style');
    </style>
@stop

@section('js')
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    @include('caja.includes.js');

    <!-- Notificaciones de Error -->
    @if(count($errors)>0)
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                html:
                '<div class="alert alert-danger alert-dismissible"><ul>'+
                @foreach($errors->all() as $error)
                    '<li><i class="icon fas fa-exclamation-triangle"></i>{{$error}}</li>'+
                @endforeach
                '</ul></div>',
                title: 'Error al realizar la orden',
                showConfirmButton: true,
                confirmButtonText: 'Cerrar'
            })
        </script>
    @endif
    <!-- / -->
@stop
