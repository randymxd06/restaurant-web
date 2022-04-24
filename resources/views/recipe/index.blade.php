@extends('adminlte::page')

@section('title', 'Recetas')

@section('content_header')
    <h1>Recetas</h1>
    <a class="btn btn-success mt-1" href="{{url('/recipes/create')}}">
        <i class="fas fa-laptop-medical"></i>
        Agregar
    </a>
    <hr class="mt-2">
@stop

@section('content')
    <div class="row row-cols-1 row-cols-md-3">

       
    <!-- /Card -->
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Receta</th>
                    <th>Producto</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($recipes as $recipe)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>183</td>
                    <td>{{$recipe->name}}</td>
                    <td>{{$recipe->product_name}}</td>
                    <td>{{($recipe->status==1)? 'True': 'False'}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <form action="{{url('/recipes/delete/'.$recipe->id)}}" method="post" class="form-delete">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="button" class="btn btn-danger" value="borrar"><i class="fas fa-trash"></i> Eliminar</button>
                            </form>
                            <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i>Editar</button>
                        </div>
                    </td>
                </tr>
                <tr class="expandable-body d-none">
                    <td colspan="5">
                        <p style="display: none;">
                            <strong>Instrucciones: </strong>{{$recipe->instructions }}
                            <table class="table w-80">
                                <thead>
                                    <tr>
                                        <th>Ingrediente</th>
                                        <th>Cantidad</th>
                                        <th>Unidad de medida</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recipe_ingredients as $ingredients)
                                    @if($ingredients->id == $recipe->id)
                                    <tr>
                                        <td>{{$ingredients->name}}</td>
                                        <td>{{$ingredients->quantity}}</td>
                                        <td>{{$ingredients->symbol}}</td>
                                        <td>{{$ingredients->description}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
                title: 'Deseas eliminar esta receta?',
                text: 'Una vez eliminado esta receta no se podra volver a obtener la informacion de este.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then(res => {
                if(res.isConfirmed){
                    Swal.fire({
                        title: 'Receta eliminada correctamente!',
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
