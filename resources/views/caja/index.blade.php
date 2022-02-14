@extends('adminlte::page')

@section('title', 'Caja')

@section('content_header')
<nav class="main-header navbar-category navbar navbar-expand navbar-orange navbar-light">
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
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
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
@stop

@section('content')

<p>Este es el modulo de caja</p>
<button type="button" class="btn btn-outline-primary">Primary</button>

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
    </style>
@stop

@section('js')
    <script>Console.log('HOLA');</script>
@stop
