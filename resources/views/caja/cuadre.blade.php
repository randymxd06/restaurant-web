@extends('adminlte::page')

@section('title', 'Cuadre de Caja')

@section('content_header')
    <h1>Cuadre de Caja</h1>
    <hr>
@stop

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10px">#Factura</th>
                <th>Tipo de orden</th>
                <th>Tipo de orden</th>
                <th style="width: 40px">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $factura)
            <tr>
                <td>{{$factura->id}}</td>
                <td>{{$factura->name}}</td>
                <td>{{$factura->created_at}}</td>
                <td>RD${{number_format($factura->total, 2, '.', ',')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <h6> <strong>Total: </strong> RD$ {{number_format($total, 2, '.', ',')}}</h6>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')
@include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
@stop

