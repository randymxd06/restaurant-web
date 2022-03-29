<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectorController;

/*----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/sectors
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS SECTORES.
------------------------------------------------------------------*/
Route::group([
    'prefix' => 'sectors',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [SectorController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [SectorController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [SectorController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [SectorController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [SectorController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [SectorController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [SectorController::class, 'destroy']);
});
