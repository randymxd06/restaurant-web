 <!-- Card -->
 @foreach ($recipes as $recipe)
            <div class="col mb-4">
                <div class="card card-outline h-100 {{(($recipe->status == 1) ? 'card-success' : (($recipe->status == 2) ? 'card-warning' : 'card-danger'))}}">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-desktop"></i>
                            Código de la receta: {{ $recipe->id }}
                        </h5>
                    </div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-archway"></i>
                                    Nombre del producto:
                                </strong>
                                {{ $recipe->product_name }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-male"></i>
                                    Nombre de la receta:
                                </strong>
                                {{ $recipe->name }}
                            </li>

                            <li class="list-group-item">
                                <strong>
                                    <i class="fas fa-male"></i>
                                    Instrucciones:
                                </strong>
                                {{ $recipe->instructions }}
                            </li>

                        </ul>

                    </div>

                    <div class="card-footer text-center">

                        <!-- The footer of the card -->
                        <div class="row">

                            {{-- BOTON EDITAR --}}
                            <div class="col-sm-12 col-md-6">
                                <a href="{{url('/recipes/edit/'.$recipe->id)}}" class="btn btn-warning col-sm-12 my-1">
                                    <i class="fas fa-edit"></i>
                                    Editar
                                </a>
                            </div>

                            {{-- BOTON ELIMINAR --}}
                            <div class="col-sm-12 col-md-6">
                                <form action="{{url('/recipes/delete/'.$recipe->id)}}" method="post" class="form-delete">
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
    