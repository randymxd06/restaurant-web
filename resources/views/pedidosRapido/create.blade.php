@extends('adminlte::page')

@section('title', 'Pantalla de Pedidos | Clientes')

@section('content_header')
<nav class="nav-banner navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{URL::asset('images/daraguma-banner.png')}}" alt="" width="100%">
        </a>
        <div class="d-flex">
            <button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                <span class="badge bg-light" id="qty-products">0
                    
                </span>
                <i class="fas fa-utensils"></i>
            </button>
        </div>
    </div>
</nav>

@stop

@section('content')
<div class="bs-stepper">
    <div class="bs-stepper-header" role="tablist">
        <!-- your steps here -->
        <div class="step" data-target="#products-part">
            <button type="button" class="step-trigger" role="tab" aria-controls="products-part" id="products-part-trigger">
                <span class="bs-stepper-circle">1</span>
                <span class="bs-stepper-label">Seleccionar Productos</span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#order-part">
            <button type="button" class="step-trigger" role="tab" aria-controls="order-part" id="order-part-trigger">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label">Confirmar Orden</span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#pay-part">
            <button type="button" class="step-trigger" role="tab" aria-controls="pay-part" id="pay-part-trigger">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label">Proceder el Pago</span>
            </button>
        </div>
    </div>
    <div class="bs-stepper-content">
        <!-- your steps content here -->
        <!-- Step Productos -->
        <div id="products-part" class="content" role="tabpanel" aria-labelledby="products-part-trigger">
            <!-- Productos -->
            <div class="tab-pane fade show active" id="Products" role="tabpanel" aria-labelledby="Products-tab">
                <div class="row row-cols-1 row-cols-md-4 g-4">

                    <!-- Card -->
                    @foreach($products as $p)
                    <div class="col">
                        <div class="card h-100">
                            
                            @if (!empty($p->image))
                            <img src="{{ asset('storage').'/'.$p->image }}" class="card-img-top" alt="...">
                            @else
                            <img src="{{URL::asset('images/daraguma-icon.png')}}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                                <p class="card-text">{{$p -> name}}</p>
                                <span class="badge bg-light text-dark">RD${{number_format($p->price, 2, '.', ',')}}</span>
                                <div class="d-flex justify-content-center mt-1">
                                    <button class="btn btn-outline-dark" onclick="ReduceProduct({{$p->id}})">
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                    <div class="input-group input-group-lg">
                                        <input id="product-{{$p->id}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="0" style="text-align:center;" disabled>
                                    </div>
                                    <button class="btn btn-outline-dark" onclick="AddProduct({{$p}})">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /Card -->
                </div>
            </div>
            <!-- /Productos-->
            <hr class="mt-4">
            <!-- Botton Siguiente Productos -->
            <div class="mt-1 float-end">
                <button class="btn btn-outline-primary float-right" onclick="confirmarProductos()">
                    Siguiente
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Step Confirmacion de Orden -->
        <div id="order-part" class="content" role="tabpanel" aria-labelledby="order-part-trigger">
            <!-- Confirmar Productos -->
            <div id="confirmar-orden" class="row row-cols-1 row-cols-md-3 g-3">
                
                
                <!-- /Card -->
            </div>
            <!-- /Productos -->
            <hr class="mt-4">
            <div class="mt-1">
                <div class="float-right">
                    <h1 class="text-end h1" id="confirmar-total">Total: RD$00.00</h1>
                    <div class="col">
                        <button class="btn btn-outline-primary" onclick="stepper.previous()">Atras</button>
                        <button class="btn btn-outline-primary" onclick="stepper.next()">Confirmar</button>
                    </div>
                </div>
            </div>  
        </div>

        <div id="pay-part" class="content" role="tabpanel" aria-labelledby="pay-part-trigger">
            <div class="row">
                <p class="pay-message h3 text-uppercase mt-5 mb-5">
                    Pague en efectivo o inserte su tarjeta
                </p>
                <p class="pay-message h3 text-uppercase mt-5 mb-5">
                    Siga las instrucciones del lector de tarjetas
                </p>
                <p class="pay-message h3 text-uppercase">
                    <i class="fas fa-arrow-down"></i>
                </p>
            </div>
            <hr class="mt-4">
            <div class="mt-1">
            <div class="float-right">
                <button class="btn btn-outline-danger" onclick="location.reload()">Cancelar Orden</button>  
                <form method="post" action="{{ url('/order_screen/store') }}">
                    <!-- TOKEN -->
                    @csrf
                    <input hidden type="number" name="user_id" id="user_id" value="{{{ Auth::user()->id }}}">
                    <input hidden type="number" name="box_id" id="box_id" value="1">
                    <input hidden type="text" name="total_order" id="total_order" value="{{old('total_order')}}">

                    <input hidden type="text" name="products" id="products" value="{{old('products')}}">
                    <!-- button -->
                    <button class="btn btn-success btn-block">
                        <i class="fas fa-receipt"></i>
                        Realizar Orden
                    </button>
                    <!-- /button -->
                </form>              
            </div>
        </div>
    </div>
</div>

<!-- Modal Carrito -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Productos Seleccionados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cant.</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody id="moda-body">
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-utensils me-1"></i> Volver
                </button>
                <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    <i class="fas fa-receipt me-2"></i> Terminar Orden
                </button> -->
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">

    
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    
    <style>
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
        .layout-navbar-fixed .wrapper .main-header, .layout-fixed .main-sidebar{
            display: none;
        }
        .content-header, .content-wrapper {
            margin: 0 !important;
            padding: 0 !important;
        }
        .layout-navbar-fixed .wrapper .content-wrapper {
            min-height: 100% !important;
            background-color: #fff !important;
        }
        .bs-stepper-content{
            background-color: #fff !important;
        }
        .content .container-fluid{
            margin: 0 !important;
            padding-top: 80px;
        }
        .nav-banner.navbar{
            height: 80px;
            
        }
        .nav-banner.navbar .navbar-brand img{
            max-height: 54px;
        }
        #order-part .card img{
            height: 100%;
            object-fit: cover;
        }
        .pay-message{
            font-family: 'Fredoka One';
            width: 100%;
            text-align: center;
        }
    </style>
@stop

@section('js')
    @include('sweetalert::alert')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script>
        var stepper = new Stepper(document.querySelector('.bs-stepper'))
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script>
        let products = [];
        let subTotal = 0;
        let total = 0;
        let QtyProducts = 0;

        function AddProduct(product) {
            let e = false;
            products.forEach(p => {
                if(p.id == product.id) {
                    e = true;
                    p.quantity += 1;
                    document.getElementById('product-'+p.id).value = p.quantity;
                }
            });
            if(!e) {
                product.quantity = 1;
                document.getElementById('product-'+product.id).value = product.quantity;
                products.push(product);
            }
            UpdateProduct();
        }

        function ReduceProduct(id) {
            for(let p=0; p<products.length; p++) {
                if(products[p].id === id) {
                    if(products[p].quantity == 1) {
                        products.splice(p, 1);
                        document.getElementById('product-'+id).value = 0;
                    }else {
                        products[p].quantity -= 1;
                        document.getElementById('product-'+id).value = products[p].quantity;
                    }
                    UpdateProduct();
                }
            }
        }

        const UpdateProduct = function() {
            let ModalHTML = "";
            let ConfirmarHTML = "";
            total = 0;
            QtyProducts = 0;

            products.forEach(p => {
                let importe = Math.round((parseFloat(p.quantity*p.price).toFixed(2))*100)/100;
                total = Math.round((total+importe)*100)/100;
                QtyProducts += p.quantity;

                // Modal
                ModalHTML +=    '<tr>'+
                                    '<th scope="row">'+
                                        '<i class="fas fa-hamburger"></i>'+
                                    '</th>'+
                                    '<td>'+p.name+'</td>'+
                                    '<td>'+p.quantity+'</td>'+
                                    '<td>RD$ '+p.price.toFixed(2)+'</td>'
                                '</tr>';

                ConfirmarHTML += ''+
                '<div class="col mt-4">'+
                '    <div class="card h-100 mb-3" style="max-width: 540px;">'+
                '        <div class="row g-0 h-100">'+
                '            <div class="col-md-4">'+
                '                <img src="http://127.0.0.1:8000/images/daraguma-icon.png" class="img-fluid rounded-start" alt="...">'+
                '            </div>'+
                '            <div class="col-md-8 d-flex align-items-center">'+
                '                <div class="card-body">'+
                '                    <p class="card-text"><strong>Cantidad: </strong>'+p.quantity+'</p>'+
                '                    <h5 class="card-title">'+p.name+'</h5>'+
                '                    <p class="card-text"><small class="text-muted">RD$'+p.price.toFixed(2)+'</small></p>'+
                '                    <p class="card-text"><strong>Importe: </strong>RD$'+importe+'</p>'+
                '                </div>'+
                '            </div>'+
                '        </div>'+
                '    </div>'+
                '</div>'
            });
            
            document.getElementById('confirmar-total').innerHTML = 'RD$'+total.toFixed(2);
            document.getElementById('confirmar-orden').innerHTML = ConfirmarHTML;
            document.getElementById('moda-body').innerHTML = ModalHTML;
            document.getElementById('qty-products').innerHTML = ""+QtyProducts;
            document.getElementById('products').value = JSON.stringify(products, null, 3);
            document.getElementById('total_order').value = total;
        }

        function confirmarProductos() {
            if(products.length > 0){
                stepper.next()
            }else { 
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No ha seleccionado los productos!',
                })
            }
        }
    </script>
@stop
