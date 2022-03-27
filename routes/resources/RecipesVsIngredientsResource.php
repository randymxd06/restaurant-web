<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipesVsIngredientsController;

/*------------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/recipes-vs-ingredients
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS RECETAS Y INGREDIENTES.
--------------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'recipes-vs-ingredients',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [RecipesVsIngredientsController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [RecipesVsIngredientsController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [RecipesVsIngredientsController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [RecipesVsIngredientsController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [RecipesVsIngredientsController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [RecipesVsIngredientsController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [RecipesVsIngredientsController::class, 'destroy']);
});
