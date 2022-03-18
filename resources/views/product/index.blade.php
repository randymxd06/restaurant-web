@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos</h1>
    <hr>
@stop

@section('content')

    <div class="row row-cols-1 row-cols-md-3">

        @foreach ($products as $product)

            <div class="col mb-4">

                <div class="card card-outline card-warning" style="min-height: 100%;">

                    <div class="">
                        <img src="{{ asset('storage').'/'.$product->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{$product->name}}</p>
                            <span class="badge bg-light text-dark">RD$ 0.00</span>
                        </div>
                    </div>

                    <div class=" text-center">

                        <!-- The footer of the card -->
                        <div class="btn-group">

                            {{-- BOTON EDITAR --}}
                            <a href="" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                                Editar
                            </a>

                            {{-- BOTON ELIMINAR --}}
                            <form action="" method="post">

                                @csrf

                                {{method_field('DELETE')}}

                                <button type="submit" onclick="return confirm('Deseas eliminar esta mesa?')" class="btn btn-danger" value="borrar">
                                    <i class="fas fa-trash"></i>
                                    Eliminar
                                </button>

                            </form>

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
@stop

@section('js')
    <script>
        Console.log('HOLA');
    </script>
@stop
