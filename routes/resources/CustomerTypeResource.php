<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerTypeController;

/*-------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/customer_type
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS TIPOS DE CLIENTES.
---------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'customer-type',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CustomerTypeController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CustomerTypeController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CustomerTypeController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CustomerTypeController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CustomerTypeController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CustomerTypeController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CustomerTypeController::class, 'destroy']);
});
