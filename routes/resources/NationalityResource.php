<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NationalityController;

/*----------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/nationality
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS NACIONALIDADES.
------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'nationality',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [NationalityController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [NationalityController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [NationalityController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [NationalityController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [NationalityController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [NationalityController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [NationalityController::class, 'destroy']);
});
