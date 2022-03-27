<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitsMeasurementController;

/*--------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/units-measurement
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS UNIDADES DE MEDIDA.
----------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'units-measurement',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [UnitsMeasurementController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [UnitsMeasurementController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [UnitsMeasurementController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [UnitsMeasurementController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [UnitsMeasurementController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [UnitsMeasurementController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [UnitsMeasurementController::class, 'destroy']);
});
