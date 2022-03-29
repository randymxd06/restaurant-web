<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocinaController;

/*-----------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/cocina
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE COCINA.
-------------------------------------------------------------*/
Route::group([
    'prefix' => 'cocina',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CocinaController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CocinaController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CocinaController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CocinaController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CocinaController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CocinaController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CocinaController::class, 'destroy']);
});
