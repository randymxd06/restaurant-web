<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/customer
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS CLIENTES.
------------------------------------------------------------------*/
Route::group([
    'prefix' => 'customer',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CustomerController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CustomerController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CustomerController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CustomerController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CustomerController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CustomerController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CustomerController::class, 'destroy']);
});
