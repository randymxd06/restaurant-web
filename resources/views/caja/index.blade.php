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
      <li class="nav-link">
        <a href="#" role="button">
          <i class="fas fa-ellipsis-v"></i>
        </a>
      </li>
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
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-header"> </li>
        <!-- Categorias -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Entradas
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Postres
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Bebidas
            </p>
          </a>
        </li>
        
        <!-- /. Categorias -->
      </ul>
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
            <button class="col ">
                <div class="card">
                    <img src="https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvYTAxOS1qYWt1YmstMDc1MS1zdXNoaS15YW0tbWFraS1yb2xsczIuanBn.jpg?s=vfs8-70mdtj139nl2sZkPbta0YANGjNJWGPHSXgRYYc"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Sushi</p>
                        <span class="badge bg-light text-dark">RD$ 100.00</span>
                    </div>
                </div>
            </button>
            <!-- /Card -->
            <button class="col ">
                <div class="card">
                    <img src="https://www.stockvault.net/data/2013/09/28/148242/preview16.jpg" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">Pizza</p>
                        <span class="badge bg-light text-dark">RD$ 100.00</span>
                    </div>
                </div>
            </button>
            <button class="col ">
                <div class="card">
                    <img src="https://img.freepik.com/foto-gratis/vista-lateral-doble-hamburguesa-queso-empanadas-carne-parrilla-queso-hojas-lechuga-bollos_141793-4883.jpg?w=740"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Hamburguesa</p>
                        <span class="badge bg-light text-dark">RD$ 100.00</span>
                    </div>
                </div>
            </button>
            <button class="col ">
                <div class="card">
                    <img src="https://img.freepik.com/foto-gratis/tazon-ramen-abulon-japones_1205-10107.jpg?w=740"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Ramen</p>
                        <span class="badge bg-light text-dark">RD$ 100.00</span>
                    </div>
                </div>
            </button>
        </div>
    </div>
    <!-- /Productos-->

    <!-- Ordenes -->
    <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
        <div class="container-order">
            <div class="order-header">
                <table class="table-order">
                    <tr>
                        <th>Empleado: </th>
                        <td>Test</td>
                    </tr>
                    <tr>
                        <th>Caja: </th>
                        <td>#02</td>
                        <th>Mesa: </th>
                        <td>#02</td>
                    </tr>
                </table>
            </div>
            <!-- Productos Ordenados -->
            <table class="order-products table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th style="width: 40px">Precio</th>
                        <th style="width: 40px">Subtotal</th>
                        <th style="width: 20px"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ramen</td>
                        <td>1</td>
                        <td>RD$100.00</td>
                        <td>RD$100.00</td>
                        <td>
                            <a href="#">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>

                    </tr>
                </tbody>
            </table>
            <!-- /Productos Ordenados -->
            <!-- Ordenes Footer -->
            <div class="order-footer">
                <div class="order-btn btnd-grid gap-2">
                    <button class="btn btn-success btn-block">
                        <i class="fas fa-receipt"></i>
                        Enviar
                    </button>
                </div>
                <!-- Detalles -->
                <table class="order-details table">
                    <tbody>
                        <tr>
                            <th>Subtotal</th>
                            <td style="width: 20px">RD$</td>
                            <td style="width: 40px">100.00</td>
                        </tr>
                        <tr>
                            <th>Descuento</th>
                            <td style="width: 20px">%</td>
                            <td style="width: 40px">00</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td style="width: 20px">RD$</td>
                            <td style="width: 40px">100.00</td>
                        </tr>
                    </tbody>
                </table>
                <!-- /Detalles -->
                <div class="order-btn d-grid gap-2 d-flex justify-content-end">
                    <button class="btn btn-dark">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn btn-success btn-lg">
                        <i class="fas fa-cash-register"></i>
                        Facturar
                    </button>
                </div>
            </div>
            <!--/ Odenes Footer -->
        </div>
    </div>
    <!-- /Ordenes -->
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
<style>
/* .content-header, .container-fluid, .content-wrapper {
margin: 0 !important;
padding: 0 !important;
} */
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
  display: block;
  bottom: 0;
  float: none;
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
.order-footer{
  width: 100%;
  position: absolute;
  bottom: 0;
  max-height: 250px;
  height: 100%;
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
<script>Console.log('HOLA');</script>
@stop
