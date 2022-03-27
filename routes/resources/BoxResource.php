<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/box
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS CAJAS.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'box',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [BoxController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [BoxController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [BoxController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [BoxController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [BoxController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [BoxController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [BoxController::class, 'destroy']);
});
