<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/recipes
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS RECETAS.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'recipes',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [RecipeController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [RecipeController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [RecipeController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [RecipeController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [RecipeController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [RecipeController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [RecipeController::class, 'destroy']);
});
