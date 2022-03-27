<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;

/*------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/provinces
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS PROVINCIAS.
--------------------------------------------------------------------*/
Route::group([
    'prefix' => 'provinces',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ProvinceController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ProvinceController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ProvinceController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ProvinceController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ProvinceController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ProvinceController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ProvinceController::class, 'destroy']);
});
