<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/currencies
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS MONEDAS.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'currencies',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CurrencyController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CurrencyController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CurrencyController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CurrencyController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CurrencyController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CurrencyController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CurrencyController::class, 'destroy']);
});
