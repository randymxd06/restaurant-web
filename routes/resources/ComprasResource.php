<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComprasController;

/*------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/compras
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE COMPRAS.
--------------------------------------------------------------*/
Route::group([
    'prefix' => 'compras',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ComprasController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ComprasController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ComprasController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ComprasController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ComprasController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ComprasController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ComprasController::class, 'destroy']);
});
