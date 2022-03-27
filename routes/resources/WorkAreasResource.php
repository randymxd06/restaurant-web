<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkAreaController;

/*------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/work-areas
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS AREAS DE TRABAJO.
--------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'work-areas',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [WorkAreaController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [WorkAreaController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [WorkAreaController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [WorkAreaController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [WorkAreaController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [WorkAreaController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [WorkAreaController::class, 'destroy']);
});
