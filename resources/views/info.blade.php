@extends('adminlte::page')

@section('title', 'Info')

@section('content_header')
<h1>Info</h1>
<p>Información sobre el sistema.</p>
@stop

@section('content')
<Table>
    <tr>
        <th scope="row">
            Version:
        </th>
        <td>0.01</td>
    </tr>
</Table>
    
    <i class="fab fa-laravel"></i>
        <i class="fab fa-font-awesome"></i>
        <i class="fab fa-github"></i>
        <i class="fab fa-node"></i>
        <i class="fab fa-node-js"></i>
        <i class="fab fa-npm"></i>
        <i class="fab fa-node"></i>
        <i class="fab fa-trello"></i>
        <i class="fab fa-discord"></i>
@stop        
@section('css')
    
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    @stop

@section('js')
    <script>Console.log('HOLA');</script>
@stop

