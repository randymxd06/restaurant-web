<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/mesas
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS MESAS.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'tables',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [TableController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [TableController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [TableController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [TableController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [TableController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [TableController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [TableController::class, 'destroy']);
});
