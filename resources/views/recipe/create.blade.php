@extends('adminlte::page')

@section('title', 'Recetas')

@section('content_header')
    <h1>Agregar Receta</h1>
    <a class="btn btn-primary mt-1" href="{{url('/recipes')}}">
        <i class="fas fa-arrow-left"></i>
        Volver
    </a>
    <hr class="mt-2">
    <!-- Mensaje de error -->
    @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        <i class="icon fas fa-exclamation-triangle"></i>{{$error}}
                    </li>
                    <hr>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- / -->
@stop

@section('content')

    <!-- Formulario Ingrediente -->
    <form action="{{url('/recipes/store')}}" method="post">

        <!-- TOKEN -->
        @csrf

        <div class="row">

            <!-- PRODUCTO -->
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label">Producto:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-hamburger"></i></span>
                        </div>
                        <select class="custom-select mr-sm-2" id="product_id" name="product_id">
                            <option selected="" disabled="">Selecciona un producto</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- / -->

            <!-- Nombre de la receta -->
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label class="form-label" for="name">Nombre de la receta:</label>
                    <input class="form-control" id="name" name="name" placeholder="Escribe el nombre del ingrediente">
                </div>
            </div>

        </div>

        <!-- Ingredientes -->
        <button type="button" class="btn btn-lg btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ingredientesModal">
            <i class="fas fa-pepper-hot"></i>
            Agregar Ingrediente
        </button>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ingrediente</th>
                        <th>Cantidad</th>
                        <th>Unidad de Medida</th>
                    </tr>
                </thead>
                <tbody id="table-ingredientes">
                
                </tbody>
            </table>
        </div>
        <input hidden type="text" name="ingredients" id="ingredients" value="{{old('ingredients')}}">

        <!-- DESCRIPCION -->
        <div class="form-group">
            <label class="form-label" for="instructions">Instrucciones:</label>
            <textarea class="form-control" id="instructions" name="instructions" rows="3"></textarea>
        </div>

        <!-- ESTADO -->
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="status" name="status">
                <label class="custom-control-label" for="status">Estado</label>
            </div>
        </div>

        <hr>

        <!-- BOTON ENVIAR -->
        <button type="submit" class="btn btn-success mt-4">
            <i class="fas fa-save"></i>
            Guardar
        </button>

    </form>
    <!-- /Formulario -->

    <!-- Modal ingredientes -->
<div class="modal fade" id="ingredientesModal" tabindex="-1" aria-labelledby="ingredientesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ingredientesModalLabel">Agregar ingredientes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Ingrediente -->
                <div class="row">
                    <div class="col-12 form-group">
                        <label class="form-label">Ingrediente:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pepper-hot"></i></span>
                            </div>
                            <select class="custom-select mr-sm-2" id="ingredients_id" name="ingredients_id">
                                <option selected="" disabled="" value="">Selecciona un ingrediente</option>
                                @foreach($ingredients as $i)
                                    <option value="{{ $i }}" onclick="seleccionado({{$i->unit_measurement_id}})">{{$i->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <label class="form-label">Cantidad:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                            </div>
                            <input autocomplete="off" type="number" class="form-control" id="quantity" name="quantity" placeholder="" value="1">
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <label class="form-label">Unidad de medida:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-weight"></i></span>
                            </div>
                            <select class="custom-select mr-sm-2" id="unit_measurement_id" name="unit_measurement_id">
                                <option selected="" disabled="" value="" >Selecciona la unidad de medida</option>
                                @foreach($unitsMeasurement as $um)
                                    <option value="{{$um}}">{{$um->name}} - {{$um->symbol}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <label class="form-label" for="description">Descripción:</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="AddIngredient()">Agregar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="../../css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
@stop

@section('js')
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    let ingredients = [];

    function AddIngredient() {
        let inputIngrediente = JSON.parse(document.getElementById('ingredients_id').value);
        let quantity = document.getElementById('quantity').value;
        let unit_measurement = JSON.parse(document.getElementById('unit_measurement_id').value);
        let description = document.getElementById('description').value;
        let e = false;

        if(inputIngrediente && Number(quantity) && unit_measurement && description) {

            let ingredient  = {
                ingredient: {
                    ingredients_id: Number(inputIngrediente.id),
                    name:  inputIngrediente.name
                },
                quantity: Number(quantity),
                unit_measurement: {
                    unit_measurement_id: Number(unit_measurement.id),
                    name: unit_measurement.name
                },
                description: description
            }
            ingredients.forEach(i => {
                if(i.ingredient.ingredients_id == inputIngrediente.id) {                    
                    e = true;
                }
            });
            
            if(!e) {
                ingredients.push(ingredient);
                Toast.fire({
                    icon: 'success',
                    title: 'Ingrediente agregado!'
                })
                
            }else {
                Toast.fire({
                    icon: 'error',
                    title: 'Este ingrediente ya esta agregado!'
                })
            }

        }else{
            console.log(1);
            Toast.fire({
                icon: 'error',
                title: 'Debe llenar todos los campos para agregar el ingrediente'
            })
        }
        refreshIngredient();
    }

    const refreshIngredient = function() {
        let ingredientesTableHTML = '';
        ingredients.forEach(i => {
            ingredientesTableHTML += '<tr>'+
                '<td>'+ i.ingredient.name +'</td>'+
                '<td>'+ i.quantity +'</td>'+
                '<td>'+ i.unit_measurement.name +'</td>'+
                '</tr>'
        }); 
        document.getElementById("table-ingredientes").innerHTML = ingredientesTableHTML;
        document.getElementById('ingredients').value = JSON.stringify(ingredients, null, 3);
    }

    let unitsMeasurement =  @json($unitsMeasurement);
    let umHTML = '';
    function seleccionado(idUM) {
        umHTML = '';
        @foreach($unitsMeasurement as $um)
                
                if({{$um->id}} == idUM) {
                    umHTML += '<option value="{{$um}}">{{$um->name}} - {{$um->symbol}}</option>';
                }
        @endforeach
        
        document.getElementById('unit_measurement_id').innerHTML = umHTML;
    }
    

    </script>
@stop
