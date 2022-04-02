@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos</h1>
    <a class="btn btn-success mt-1" href="{{url('/products/create')}}">
        <i class="fas fa-tags"></i>
        Agregar
    </a>
    <hr class="mt-2">
@stop

@section('content')

<div class="row row-cols-2 row-cols-md-3 g-3 mb-4">
    <!-- Card Producto -->
    @foreach( $products as $p )
    <div class="col mt-3">
        <div class="card h-100 card-outline {{($p->status == true || $p->status == 1) ? 'card-success' : 'card-danger'}}">
            @if (!empty($p->image)) 
                <img src="{{ asset('storage').'/'.$p->image }}" class="card-img-top" alt="...">
            @else
                <img src="{{URL::asset('images/daraguma-icon.png')}}" class="card-img-top" alt="...">
            @endif
            <div class="card-body">
                <h5 class="h3">{{ $p -> name }}</h5>
                <div class="card-text">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>
                                <i class="fas fa-file-alt"></i>
                                Descripción: 
                            </strong>
                            <!-- Descripcion -->
                            {{ $p -> description }}
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <i class="fas fa-tag"></i>
                                Categoria: 
                            </strong>
                            <!-- Categoria -->
                            @foreach($ProductCategories as $category)
                                    {{ ($category->id == $p->products_categories_id) ? $category->name : '' }}
                            @endforeach
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <i class="fas fa-money-bill-wave"></i>
                                Precio: 
                            </strong>
                            <!-- Precio -->
                            <span class="badge bg-light text-dark">RD$ {{ number_format($p->price, 2, '.', ','); }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <div class="btn-group">
                    <!-- Boton Editar -->
                    <a href="{{url('/products/edit/'.$p->id)}}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                        Editar
                    </a>
                    <!-- Boton Eliminar -->
                    <form action="{{ url('/products/delete/'.$p->id) }}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('¿Deseas eliminar esta categoria?')" class="btn btn-danger" value="borrar">
                            <i class="fas fa-trash"></i>
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- /Card Producto -->


        <!-- <div class="col">
            <div class="card card-outline card-warning h-100" style="min-height: 100%;">
                <div class="">
                    <img src="" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">name</p>
                        <span class="badge bg-light text-dark">RD$precio</span>
                    </div>
                </div>
                <div class=" text-center">
                    The footer of the card
                    <div class="btn-group">
                        Boton Editar
                        <a href="" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                            Editar
                        </a>
                        Boton Eliminar
                        <form action="" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger" value="borrar">
                                <i class="fas fa-trash"></i>
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
    
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    <style>
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
    </style>
@stop

@section('js')
@include('sweetalert::alert')
    <script>
        Console.log('HOLA');
    </script>
@stop
