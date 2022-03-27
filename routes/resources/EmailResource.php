<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

/*----------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/emails
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS CORREOS ELECTRONICOS.
------------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'emails',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [EmailController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [EmailController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [EmailController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [EmailController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [EmailController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [EmailController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [EmailController::class, 'destroy']);
});
