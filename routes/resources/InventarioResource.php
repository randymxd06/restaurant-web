<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/inventario
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE INVENTARIO.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'inventario',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [InventarioController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [InventarioController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [InventarioController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [InventarioController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [InventarioController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [InventarioController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [InventarioController::class, 'destroy']);
});
