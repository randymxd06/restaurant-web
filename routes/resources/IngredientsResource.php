<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;

/*--------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/ingredients
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS INGREDIENTES.
----------------------------------------------------------------------*/
Route::group([
    'prefix' => 'ingredients',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [IngredientController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [IngredientController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [IngredientController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [IngredientController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [IngredientController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [IngredientController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [IngredientController::class, 'destroy']);
});
