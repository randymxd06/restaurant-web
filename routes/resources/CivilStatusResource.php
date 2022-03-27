<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CivilStatusController;

/*-----------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/civil_status
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS ESTADOS CIVILES.
-------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'civil_status',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CivilStatusController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CivilStatusController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CivilStatusController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CivilStatusController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CivilStatusController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CivilStatusController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CivilStatusController::class, 'destroy']);
});
