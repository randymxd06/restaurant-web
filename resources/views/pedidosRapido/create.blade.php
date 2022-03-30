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
                <span class="badge bg-light">3</span>
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
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvYTAxOS1qYWt1YmstMDc1MS1zdXNoaS15YW0tbWFraS1yb2xsczIuanBn.jpg?s=vfs8-70mdtj139nl2sZkPbta0YANGjNJWGPHSXgRYYc"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Sushi</p>
                                <span class="badge bg-light text-dark">RD$ 100.00</span>
                                <div class="d-flex justify-content-center mt-1">
                                    <button class="btn btn-outline-dark">
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="0" style="text-align:center;" disable>
                                    </div>
                                    <button class="btn btn-outline-dark">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Card -->

                    <div class="col">
                        <div class="card h-100">
                            <img src="https://www.stockvault.net/data/2013/09/28/148242/preview16.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <p class="card-text">Pizza</p>
                                <span class="badge bg-light text-dark">RD$ 100.00</span>
                                <div class="d-flex justify-content-center mt-1">
                                    <button class="btn btn-outline-dark">
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="0" style="text-align:center;" disable>
                                    </div>
                                    <button class="btn btn-outline-dark">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <img src="https://img.freepik.com/foto-gratis/vista-lateral-doble-hamburguesa-queso-empanadas-carne-parrilla-queso-hojas-lechuga-bollos_141793-4883.jpg?w=740"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Hamburguesa</p>
                                <span class="badge bg-light text-dark">RD$ 100.00</span>
                                <div class="d-flex justify-content-center mt-1">
                                    <button class="btn btn-outline-dark">
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="0" style="text-align:center;" disable>
                                    </div>
                                    <button class="btn btn-outline-dark">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <img src="https://img.freepik.com/foto-gratis/tazon-ramen-abulon-japones_1205-10107.jpg?w=740"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Ramen</p>
                                <span class="badge bg-light text-dark">RD$ 100.00</span>
                                <div class="d-flex justify-content-center mt-1">
                                    <button class="btn btn-outline-dark">
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="0" style="text-align:center;" disable>
                                    </div>
                                    <button class="btn btn-outline-dark">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Card -->
                </div>
            </div>
            <!-- /Productos-->
            <hr class="mt-4">
            <!-- Botton Siguiente Productos -->
            <div class="mt-1 float-end">
                <button class="btn btn-outline-primary float-right" onclick="stepper.next()">
                    Siguiente
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Step Confirmacion de Orden -->
        <div id="order-part" class="content" role="tabpanel" aria-labelledby="order-part-trigger">
            <!-- Confirmar Productos -->
            <div class="row row-cols-1 row-cols-md-3 g-3">
                <!-- Card -->
                <div class="col mt-4">
                    <div class="card h-100 mb-3" style="max-width: 540px;">
                        <div class="row g-0 h-100">
                            <div class="col-md-4">
                                <img src="https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvYTAxOS1qYWt1YmstMDc1MS1zdXNoaS15YW0tbWFraS1yb2xsczIuanBn.jpg?s=vfs8-70mdtj139nl2sZkPbta0YANGjNJWGPHSXgRYYc" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <div class="card-body">
                                    <p class="card-text"><strong>Cantidad: </strong>1</p>
                                    <h5 class="card-title">Sushi</h5>
                                    <p class="card-text"><small class="text-muted">RD$100.00</small></p>
                                    <p class="card-text"><strong>Sub Total: </strong>RD$100.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col mt-4">
                    <div class="card h-100 mb-3" style="max-width: 540px;">
                        <div class="row g-0 h-100">
                            <div class="col-md-4">
                                <img src="https://img.freepik.com/foto-gratis/tazon-ramen-abulon-japones_1205-10107.jpg?w=740" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <div class="card-body">
                                    <p class="card-text"><strong>Cantidad: </strong>1</p>
                                    <h5 class="card-title">Ramen</h5>
                                    <p class="card-text"><small class="text-muted">RD$100.00</small></p>
                                    <p class="card-text"><strong>Sub Total: </strong>RD$100.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col mt-4">
                    <div class="card h-100 mb-3" style="max-width: 540px;">
                        <div class="row g-0 h-100">
                            <div class="col-md-4">
                                <img src="https://www.stockvault.net/data/2013/09/28/148242/preview16.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <div class="card-body">
                                    <p class="card-text"><strong>Cantidad: </strong>1</p>
                                    <h5 class="card-title">Ramen</h5>
                                    <p class="card-text"><small class="text-muted">RD$100.00</small></p>
                                    <p class="card-text"><strong>Sub Total: </strong>RD$100.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Card -->
            </div>
            <!-- /Productos -->
            <hr class="mt-4">
            <div class="mt-1">
                <div class="float-right">
                    <h1 class="text-end h1" >Total: RD$300.00</h1>
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
                <button class="btn btn-outline-danger">Cancelar Orden</button>                
                <button type="button" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Realizar pago
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
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
                    <tbody>
                        <tr>
                            <th scope="row">
                                <i class="fas fa-hamburger"></i>
                            </th>
                            <td>Sushi</td>
                            <td>1</td>
                            <td>RD$ 100.00</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fas fa-hamburger"></i>
                            </th>
                            <td>Ramen</td>
                            <td>1</td>
                            <td>RD$ 100.00</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fas fa-pizza-slice"></i>
                            </th>
                            <td>Pizza</td>
                            <td>1</td>
                            <td>RD$ 100.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-utensils me-1"></i> Volver
                </button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    <i class="fas fa-receipt me-2"></i> Terminar Orden
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">

    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    
    <style>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script>
        var stepper = new Stepper(document.querySelector('.bs-stepper'))
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

@stop
