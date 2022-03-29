<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecepcionController;

/*--------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/recepcion
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE RECEPCION.
----------------------------------------------------------------*/
Route::group([
    'prefix' => 'recepcion',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [RecepcionController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [RecepcionController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [RecepcionController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [RecepcionController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [RecepcionController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [RecepcionController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [RecepcionController::class, 'destroy']);
});
