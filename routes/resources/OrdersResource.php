<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/orders
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS ORDENES.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'orders',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [OrderController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [OrderController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [OrderController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [OrderController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [OrderController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [OrderController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [OrderController::class, 'destroy']);
});
