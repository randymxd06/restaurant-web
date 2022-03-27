<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntityController;

/*-----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/entities
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS ENTIDADES.
-------------------------------------------------------------------*/
Route::group([
    'prefix' => 'entities',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [EntityController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [EntityController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [EntityController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [EntityController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [EntityController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [EntityController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [EntityController::class, 'destroy']);
});
