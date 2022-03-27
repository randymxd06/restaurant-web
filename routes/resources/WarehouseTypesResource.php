<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarehouseTypeController;

/*--------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/warehouse-type
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS TIPOS DE ALMACENES.
----------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'warehouse-type',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [WarehouseTypeController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [WarehouseTypeController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [WarehouseTypeController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [WarehouseTypeController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [WarehouseTypeController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [WarehouseTypeController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [WarehouseTypeController::class, 'destroy']);
});
