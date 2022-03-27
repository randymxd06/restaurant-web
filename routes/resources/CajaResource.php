<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CajaController;

/*---------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/caja
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE CAJA.
-----------------------------------------------------------*/
Route::group([
    'prefix' => 'caja',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CajaController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CajaController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CajaController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CajaController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CajaController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CajaController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CajaController::class, 'destroy']);
});
