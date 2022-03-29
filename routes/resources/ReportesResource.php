<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportesController;

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/reportes
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE REPORTES.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'reportes',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ReportesController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ReportesController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ReportesController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ReportesController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ReportesController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ReportesController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ReportesController::class, 'destroy']);
});
