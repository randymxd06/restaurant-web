<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

/*---------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/menu
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE MENU.
-----------------------------------------------------------*/
Route::group([
    'prefix' => 'menu',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [MenuController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [MenuController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [MenuController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [MenuController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [MenuController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [MenuController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [MenuController::class, 'destroy']);
});
