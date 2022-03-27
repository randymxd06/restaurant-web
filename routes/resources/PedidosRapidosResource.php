<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosRapidosController;

/*--------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/Pantalla-pedidos-rapidos
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE PEDIDOS RAPIDOS.
----------------------------------------------------------------------*/
Route::group([
    'prefix' => 'order_screen',
], function () {
    Route::get('/', [PedidosRapidosController::class, 'index']);
    Route::get('/show/{id}', [PedidosRapidosController::class, 'show']);
    Route::get('/create', [PedidosRapidosController::class, 'create']);
    Route::post('/store', [PedidosRapidosController::class, 'store']);
    Route::get('/edit/{id}', [PedidosRapidosController::class, 'edit']);
    Route::put('/update/{id}', [PedidosRapidosController::class, 'update']);
    Route::delete('/delete/{id}', [PedidosRapidosController::class, 'destroy']);
});
