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

            <div class="card-footer justify-content-center">

                <div class="row">

                    <!-- Boton Editar -->
                    <div class="col-sm-12 col-md-6">
                        <a href="{{url('/products/edit/'.$p->id)}}" class="btn btn-warning col-sm-12 my-1">
                            <i class="fas fa-edit"></i>
                            Editar
                        </a>
                    </div>
                    <!-- Boton Eliminar -->

                    <div class="col-sm-12 col-md-6">
                        <form action="{{ url('/products/delete/'.$p->id) }}" method="post" class="form-delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger col-sm-12 my-1" value="borrar">
                                <i class="fas fa-trash"></i>
                                Eliminar
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

    @endforeach

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
        $('.form-delete').submit(function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Deseas eliminar este producto?',
                text: 'Una vez eliminado este producto no se podra volver a obtener la informacion de este.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then(res => {

                if(res.isConfirmed){

                    Swal.fire({
                        title: 'Producto eliminado correctamente!',
                        icon: 'success',
                        showCancelButton: false,
                    })

                    setTimeout(() => {
                        this.submit();
                    }, 1000)

                }

            })
        })
    </script>
@stop
