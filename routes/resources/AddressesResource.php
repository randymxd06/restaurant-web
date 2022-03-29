<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressesController;

/*-------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/addresses
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS DIRECCIONES.
---------------------------------------------------------------------*/
Route::group([
    'prefix' => 'addresses',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [AddressesController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [AddressesController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [AddressesController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [AddressesController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [AddressesController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [AddressesController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [AddressesController::class, 'destroy']);
});
