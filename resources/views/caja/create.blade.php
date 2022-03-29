@extends('adminlte::page')

@section('title', 'Caja')

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
        <li class="nav-item dropdown show">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                    <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <span class="dropdown-item dropdown-header">Configuración</span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-toggle="modal" data-target="#tableModal">
                    <i class="fas fa-chair mr-2"></i> Seleccionar Mesa
                    <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#customersModal">
                    <i class="far fa-user mr-2"></i> Seleccionar Cliente
                    <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-percent mr-2"></i> Aplicar Descuento
                    <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Cambiar Usuario
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
                <i class="nav-icon fas fa-th"></i>
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
            <button onclick="addProduct({{$p}})" class="col">
                <div class="card h-100">
                    @if (!empty($p->image)) 
                        <img src="{{ asset('storage').'/'.$p->image }}" class="card-img-top" alt="...">
                    @else
                        <img src="{{URL::asset('images/daraguma-icon.png')}}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <p class="card-text"> {{ $p -> name }} </p>
                        <span class="badge bg-light text-dark">RD$ {{ number_format($p->price, 2, '.', ','); }}</span>
                    </div>
                </div>
            </button>
            @endforeach
            <!-- /Card -->         
        </div>
    </div>
    <!-- /Productos-->

    <aside class="control-sidebar control-sidebar-light order-sidebar">
        
            
            <!-- Ordenes -->
            <div class="order-header">
                <table class="table-order">
                    <tr>
                        <th>Empleado: </th>
                        <td>{{{ Auth::user()->name }}}</td>
                    </tr>
                    <tr>
                        <th>Caja: </th>
                        <td>#02</td>
                        <th>Mesa: </th>
                        <td class="id-mesa" id="id-mesa">#1</td>
                    </tr>
                </table>
            </div>
            <!-- Productos Ordenados -->
            <table class="order-products-head table table-striped">
                <thead>
                    <tr>
                        <th style="width: 170px;">Nombre</th>
                        <th>Qty.</th>
                        <th>Precio</th>
                        <th>
                            <!-- <i class="far fa-trash-alt"></i> -->
                        </th>
                    </tr>
                </thead>
            </table>
            <div class="order-products-body sidebar table-responsive">
                <table class="table table-striped" id="add-products">
                
                </table>
            </div>
            <!-- /Productos Ordenados -->
            <!-- Ordenes Footer -->
            <div class="order-footer">
                <div class="order-btn btnd-grid gap-2">
                    <!-- Formulario -->
                    <form method="post" action="{{ url('/caja/store') }}">
                        <!-- TOKEN -->
                        @csrf
                        
                        <input hidden type="number" name="user_id" id="user_id" value="{{{ Auth::user()->id }}}">
                        <input hidden type="number" name="box_id" id="box_id" value="1">
                        <input hidden type="number" name="customer_id" id="customer_id" value="1">
                        <input hidden type="number" name="table_id" id="table_id" value="0">
                        <input hidden type="text" name="total_order" id="total_order" value="0">
                        
                        <input hidden type="text" name="products" id="products" value="">
                        <!-- button -->
                        <button class="btn btn-success btn-block">
                            <i class="fas fa-receipt"></i>
                            Enviar
                        </button>
                        <!-- /button -->
                    </form>
                    <!-- /Formulario -->
                </div>
                <!-- Detalles -->
                <table class="order-details table">
                    <tbody>
                        <tr>
                            <th>Subtotal</th>
                            <td style="width: 20px">RD$</td>
                            <td style="width: 40px" name="order-subtotal" id="order-subtotal">100.00</td>
                        </tr>
                        <tr>
                            <th>Descuento</th>
                            <td style="width: 20px">%</td>
                            <td style="width: 40px" name="order-descuento" id="order-descuento">00</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td style="width: 20px">RD$</td>
                            <td style="width: 40px" name="order-total" id="order-total">100.00</td>
                        </tr>
                    </tbody>
                </table>
                <!-- /Detalles -->
                <div class="order-btn d-grid gap-2 d-flex justify-content-end">
                        <!-- button -->
                        <button class="btn btn-dark">
                            <i class="fas fa-trash"></i>
                        </button>
                        <!-- /button -->
                    <button class="btn btn-success btn-lg" disabled>
                        <i class="fas fa-cash-register"></i>
                        Facturar
                    </button>
                </div>
            </div>
            <!--/ Odenes Footer -->
        <!-- /Ordenes -->
        
    </aside>
</div>

<!-- Modal para seleccionar mesa -->
<div class="modal fade" id="tableModal" tabindex="-1" role="dialog" aria-labelledby="tableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="tableModalTitle">Seleccionar Mesa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Salon</th>
                            <th>Estado</th>
                            <th style="width: 40px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables as $t)
                            <tr>
                                <td> {{ $t -> id }} </td>
                                
                                @foreach($livingRooms as $lr)
                                    @if($lr->id == $t->living_room_id)                                
                                        <td> {{ $lr -> name }} </td>
                                    @endif
                                @endforeach
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar {{(($t->status == 1) ? 'bg-success' : 'bg-warning')}}" style="width: 100%"></div>
                                    </div>
                                </td>
                                <td>
                                    @if($t->status == 1)                                
                                        <button class="btn btn-primary btn-xs" data-dismiss="modal" onclick="selectTable({{ $t->id }})">
                                            <i class="fas fa-hand-pointer"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- / -->

<!-- Modal para seleccionar Cliente -->
<div class="modal fade" id="customersModal" tabindex="-1" role="dialog" aria-labelledby="customersModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="tableModalTitle">Seleccionar Cliente</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Salon</th>
                            <th style="width: 40px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $customers as $c )
                            <tr>
                                <td> {{ $c -> id }} </td>
                                <td>Name</td>
                                <td>
                                    <button class="btn btn-primary btn-xs" data-dismiss="modal" onclick="selectTable({{ $c->id }})">
                                        <i class="fas fa-hand-pointer"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- / -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
<style>
    /* .content-header, .container-fluid, .content-wrapper {
    margin: 0 !important;
    padding: 0 !important;
    } */
    .order-products-body{
        height: 200px !important ;
        margin-top: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    .order-products-head{
        margin-bottom: 0 !important
    }
    .layout-fixed .control-sidebar.order-sidebar{
        display: block;
        max-width: 350px;
        width: 100%;
        float: right !important;
        right: 0;
    }
    .layout-navbar-fixed .wrapper .main-header, .layout-fixed .main-sidebar{
        display: none;
    }
    .sidebar-category{
        display: block !important;
    }
    .navbar-category{
        display: flex !important;
    }
    /* Order */
    .container-order{
        bottom: 0;
        right: 0;
        position: fixed;
        top: 56px;
        font-size: 12px;
        background-color: #fff;
        max-width: 360px;
        width: 100%;
    }
    .order-btn{
        padding: 0 0.5rem;
    }
    .table-order {
        width: 100%;
    }
    .table-order th {
        width: 80px;
        padding: 4px 10px;
    }
    .order-footer {
        position: absolute;
        width: 100%;
        bottom: 6px;
    }
    .order-details{
        font-size: 14px;
    }
    /*  */
    .content-wrapper{
        margin-right: 360px;
    }

    .tabs-menu-div{
        display: none;
        left: 0;
        position: fixed;
        right: 0;
        top: 56px;
    }
    .card-body{
        text-align: left;
    }
    .card-img-top {
        height: 180px;
        object-fit: cover;
    }

    @media screen and (max-width: 768px) {
    /*   */

    }
    @media screen and (min-width: 640px) {
        .tab-content>.tab-pane {
        display: block;
        }

        .fade:not(.show) {
        opacity: 100;
        }
    }
    @media screen and (max-width: 640px) {
        .container-order{
            display: contents;
        }
        .content-wrapper{
            margin-right: auto;
        }
        .tabs-menu-div{
            display: flex;
        }
        .content-wrapper>.content{
            padding: 2rem 0;
        }
        .container-fluid{
            padding: 0;
        }
        #Products {
            padding: 1rem;
        }
    }
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
    // Objeto con los Productos Seleccionados
    let products = []; 

    // Funcion para Agregar Productos
    function addProduct(p){
        let e = false;
        p.qty = 0;
        
        for(let i of products){
            if(i.name == p.name){
                e = true;
                i.qty+=1;
                break;
            }
        }
        
        if(!e){
            p.qty+=1;
            products.push(p);
        }

        refreshProduct();
    }

    // Funcion Para reducir productos
    function reduceProduct(id){
        //  Recorerr los productos agregadors
        
        for (let p = 0; p < products.length; p++){
            // If para verificar si el producto a eliminar existe en la lista
            if(products[p].id === id){
                // If para eliminar si la cantidad es igual a 1, de lo contrario reducir 1
                if(products[p].qty == 1){
                    products.splice(p, 1);
                }else{
                    products[p].qty-=1;
                }
                refreshProduct();
                return
            }
        }
    }

    // Funcion para actualizar los productos en el html
    const refreshProduct = function(){
        let listProductsHTML = "";
        let total = 0;

        products.forEach(pro => {    
            let importe = Math.round((parseFloat(pro.qty*pro.price).toFixed(2))*100)/100;
            total = Math.round((total+importe)*100)/100;
            console.log('Total: '+total);
            listProductsHTML += '<tr>'+
                                    '<td style="width: 170px;">'+pro.name+'</td>'+
                                    '<td>'+pro.qty+'</td>'+
                                    '<td>RD$'+importe+'</td>'+
                                    '<td><button onclick="reduceProduct('+ pro.id +')"><i class="far fa-trash-alt"></i></button></td>'+
                                '</tr>';
        });
        document.getElementById("add-products").innerHTML = listProductsHTML;
        document.getElementById('products').value = JSON.stringify(products, null, 3);
        document.getElementById('total_order').value = total;
    } 

    // Seleccionar mesa
    function selectTable(id){
        let table_id = id;
        document.getElementById("id-mesa").innerHTML = '#'+table_id;
        document.getElementById('table_id').value = table_id;
    }

  // 
</script>

@stop