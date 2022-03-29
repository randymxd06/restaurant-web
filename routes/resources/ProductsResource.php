<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*-----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/products
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS PRODUCTOS.
-------------------------------------------------------------------*/
Route::group([
    'prefix' => 'products',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ProductController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ProductController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ProductController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ProductController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ProductController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ProductController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ProductController::class, 'destroy']);
});
