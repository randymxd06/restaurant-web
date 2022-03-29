<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

/*---------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/reservation
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS RESERVACIONES.
-----------------------------------------------------------------------*/
Route::group([
    'prefix' => 'reservation',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ReservationController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ReservationController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ReservationController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ReservationController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ReservationController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ReservationController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ReservationController::class, 'destroy']);
});
