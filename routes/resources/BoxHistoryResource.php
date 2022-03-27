<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxHistoryController;

/*-----------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/box-history
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR EL HISTORIAL DE LAS CAJAS.
-------------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'box-history',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [BoxHistoryController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [BoxHistoryController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [BoxHistoryController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [BoxHistoryController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [BoxHistoryController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [BoxHistoryController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [BoxHistoryController::class, 'destroy']);
});
