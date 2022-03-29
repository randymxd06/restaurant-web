<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderTypeController;

/*------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/order_type
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS TIPOS DE ORDENES.
--------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'order_type',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [OrderTypeController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [OrderTypeController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [OrderTypeController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [OrderTypeController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [OrderTypeController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [OrderTypeController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [OrderTypeController::class, 'destroy']);
});
