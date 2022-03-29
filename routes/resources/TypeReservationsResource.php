<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeReservationController;

/*------------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/type-reservation
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS TIPOS DE RESERVACIONES.
--------------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'type-reservation',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [TypeReservationController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [TypeReservationController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [TypeReservationController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [TypeReservationController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [TypeReservationController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [TypeReservationController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [TypeReservationController::class, 'destroy']);
});
