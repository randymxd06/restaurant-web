<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientsStockController;

/*--------------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/ingredients-stock
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR EL STOCK DE LOS INGREDIENTES.
----------------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'ingredients-stock',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [IngredientsStockController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [IngredientsStockController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [IngredientsStockController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [IngredientsStockController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [IngredientsStockController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [IngredientsStockController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [IngredientsStockController::class, 'destroy']);
});
