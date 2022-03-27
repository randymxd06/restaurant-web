<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;

/*-------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/providers
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS PROVEEDORES.
---------------------------------------------------------------------*/
Route::group([
    'prefix' => 'providers',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ProviderController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ProviderController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ProviderController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ProviderController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ProviderController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ProviderController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ProviderController::class, 'destroy']);
});
