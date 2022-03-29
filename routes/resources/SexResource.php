<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SexController;

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/sex
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS SEXOS.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'sex',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [SexController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [SexController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [SexController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [SexController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [SexController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [SexController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [SexController::class, 'destroy']);
});
