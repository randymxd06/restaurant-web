<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderProductController;

/*-------------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/order-product
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS DETALLES DE LAS ORDENES.
---------------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'order-product',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [OrderProductController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [OrderProductController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [OrderProductController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [OrderProductController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [OrderProductController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [OrderProductController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [OrderProductController::class, 'destroy']);
});
