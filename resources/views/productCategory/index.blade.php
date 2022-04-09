@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
    <a class="btn btn-success mt-1" href="{{url('/product_category/create')}}">
        <i class="fas fa-tags"></i>
        Agregar
    </a>
    <hr class="mt-2">
@stop

@section('content')
<div class="row row-cols-1 row-cols-md-3">
    <!-- Card -->
    @foreach( $productCategories as $Category )
    <div class="col mb-4">
        <div class="card h-100 card-outline {{($Category->status == true || $Category->status == 1) ? 'card-success' : 'card-danger'}}">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-tag"></i>
                    <!-- Nombre -->
                    {{ $Category -> name }}
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>
                            <i class="fas fa-file-alt"></i>
                            Descripción:
                        </strong>
                        <!-- Descripcion -->
                        {{ $Category -> description }}
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">

                <!-- The footer of the card -->
                <div class="row">

                    <!-- Boton Editar -->
                    <div class="col-sm-12 col-md-6">
                        <a href="{{url('/product_category/edit/'.$Category->id)}}" class="btn btn-warning col-sm-12 my-1">
                            <i class="fas fa-edit"></i>
                            Editar
                        </a>
                    </div>
                    <!-- Boton eliminar -->

                    <div class="col-sm-12 col-md-6">
                        <form action="{{ url('/product_category/delete/'.$Category->id) }}" method="post" class="form-delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger col-sm-12 my-1">
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
    <!-- / -->
</div>
@stop

@section('css')
    
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    <style>
        .card-title{
            font-weight: bold !important
        }
    </style>
@stop

@section('js')
    @include('sweetalert::alert')
    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Deseas eliminar esta categoria de producto?',
                text: 'Una vez eliminado esta categoria de producto no se podra volver a obtener la informacion de este.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then(res => {

                if(res.isConfirmed){
                    Swal.fire({
                        title: 'Categoria de producto eliminada correctamente!',
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
