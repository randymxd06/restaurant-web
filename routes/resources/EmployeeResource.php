<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*-----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/employees
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS EMPLEADOS.
-------------------------------------------------------------------*/
Route::group([
    'prefix' => 'employees',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [EmployeeController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [EmployeeController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [EmployeeController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [EmployeeController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [EmployeeController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [EmployeeController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [EmployeeController::class, 'destroy']);
});
