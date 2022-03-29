<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivingRoomController;

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/living_room
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS SALONES.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'livingrooms',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [LivingRoomController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [LivingRoomController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [LivingRoomController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [LivingRoomController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [LivingRoomController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [LivingRoomController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [LivingRoomController::class, 'destroy']);
});
