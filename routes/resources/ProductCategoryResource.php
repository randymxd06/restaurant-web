<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;

/*-----------------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/product_category
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS CATEGORIAS DE LOS PRODUCTOS.
-------------------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'product_category',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ProductCategoryController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ProductCategoryController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ProductCategoryController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ProductCategoryController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ProductCategoryController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ProductCategoryController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ProductCategoryController::class, 'destroy']);
});
