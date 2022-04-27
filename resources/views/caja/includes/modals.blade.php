<!-- Modal para seleccionar mesa -->
<div class="modal fade" id="tableModal" tabindex="-1" role="dialog" aria-labelledby="tableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="tableModalTitle">Seleccionar Mesa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Salon</th>
                            <th>Estado</th>
                            <th style="width: 40px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables as $t)
                            <tr>
                                <td> {{ $t -> id }} </td>
                                
                                @foreach($livingRooms as $lr)
                                    @if($lr->id == $t->living_room_id)                                
                                        <td> {{ $lr -> name }} </td>
                                    @endif
                                @endforeach
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar {{(($t->status == 1) ? 'bg-success' : 'bg-warning')}}" style="width: 100%"></div>
                                    </div>
                                </td>
                                <td>
                                    @if($t->status == 1)                                
                                        <button class="btn btn-primary btn-xs" data-dismiss="modal" onclick="selectTable({{ $t->id }})">
                                            <i class="fas fa-hand-pointer"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- / -->

<!-- Modal para seleccionar Cliente -->
<div class="modal fade" id="customersModal" tabindex="-1" role="dialog" aria-labelledby="customersModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="tableModalTitle">Seleccionar Cliente</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nombre</th>
                            <th style="width: 40px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $customers as $c )
                            <tr>
                                <td> {{ $c -> id }} </td>
                                <td>{{$c->first_name}} {{$c->last_name}}</td>
                                <td>
                                    <button class="btn btn-primary btn-xs" data-dismiss="modal" onclick="selectCustomer({{ $c->id }},'{{$c->first_name}} {{$c->last_name}}')">
                                        <i class="fas fa-hand-pointer"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- / -->


<!-- Modal Ordenes sin facturar -->
<div class="modal fade" id="ordenesModal" tabindex="-1" role="dialog" aria-labelledby="ordenesModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="tableModalTitle">Ordenes sin facturar</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-hover ">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Mesa</th>
                            <th scope="col">Entrega</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- No facturadas -->
                    @foreach( $orders as $order )
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->first_name}} {{$order->last_name}}</td>
                            <td>{{$order->table_id}}</td>
                            <td>{{($order->status == 0)? 'Entregado': 'No entregado'}}</td>
                            <td>
                                <a href="{{url('/caja/edit/'.$order->id)}}" class="btn btn-primary btn-xs">
                                    <i class="fas fa-hand-pointer"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- / -->