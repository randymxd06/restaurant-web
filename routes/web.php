<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\CocinaController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidosRapidosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\InventarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login ');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

/*---------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/caja
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE CAJA.
-----------------------------------------------------------*/
Route::group([
    'prefix' => 'caja',
], function () {
    Route::get('/', [CajaController::class, 'index']);
    Route::post('/', [CajaController::class, 'store']);
    Route::get('/{id}', [CajaController::class, 'show']);
    Route::put('/{id}', [CajaController::class, 'update']);
    Route::delete('/{id}', [CajaController::class, 'destroy']);
});

/*--------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/recepcion
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE RECEPCION.
----------------------------------------------------------------*/
Route::group([
    'prefix' => 'recepcion',
], function () {
    Route::get('/', [RecepcionController::class, 'index']);
    Route::post('/', [RecepcionController::class, 'store']);
    Route::get('/{id}', [RecepcionController::class, 'show']);
    Route::put('/{id}', [RecepcionController::class, 'update']);
    Route::delete('/{id}', [RecepcionController::class, 'destroy']);
});

/*-----------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/cocina
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE COCINA.
-------------------------------------------------------------*/
Route::group([
    'prefix' => 'cocina',
], function () {
    Route::get('/', [CocinaController::class, 'index']);
    Route::post('/', [CocinaController::class, 'store']);
    Route::get('/{id}', [CocinaController::class, 'show']);
    Route::put('/{id}', [CocinaController::class, 'update']);
    Route::delete('/{id}', [CocinaController::class, 'destroy']);
});

/*----------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/mesas
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE MESAS.
------------------------------------------------------------*/
Route::group([
    'prefix' => 'mesas',
], function () {
    Route::get('/', [MesasController::class, 'index']);
    Route::get('/create', [MesasController::class, 'create']);
    Route::post('/', [MesasController::class, 'store']);
    Route::get('/{id}', [MesasController::class, 'show']);
    Route::put('/{id}', [MesasController::class, 'update']);
    Route::delete('/{id}', [MesasController::class, 'destroy']);
});

/*---------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/menu
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE MENU.
-----------------------------------------------------------*/
Route::group([
    'prefix' => 'menu',
], function () {
    Route::get('/', [MenuController::class, 'index']);
    Route::post('/', [MenuController::class, 'store']);
    Route::get('/{id}', [MenuController::class, 'show']);
    Route::put('/{id}', [MenuController::class, 'update']);
    Route::delete('/{id}', [MenuController::class, 'destroy']);
});

/*--------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/pedidos-rapidos
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE PEDIDOS RAPIDOS.
----------------------------------------------------------------------*/
Route::group([
    'prefix' => 'pedidos-rapidos',
], function () {
    Route::get('/', [PedidosRapidosController::class, 'index']);
    Route::post('/', [PedidosRapidosController::class, 'store']);
    Route::get('/{id}', [PedidosRapidosController::class, 'show']);
    Route::put('/{id}', [PedidosRapidosController::class, 'update']);
    Route::delete('/{id}', [PedidosRapidosController::class, 'destroy']);
});

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/reportes
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE REPORTES.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'reportes',
], function () {
    Route::get('/', [ReportesController::class, 'index']);
    Route::post('/', [ReportesController::class, 'store']);
    Route::get('/{id}', [ReportesController::class, 'show']);
    Route::put('/{id}', [ReportesController::class, 'update']);
    Route::delete('/{id}', [ReportesController::class, 'destroy']);
});

/*------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/compras
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE COMPRAS.
--------------------------------------------------------------*/
Route::group([
    'prefix' => 'compras',
], function () {
    Route::get('/', [ComprasController::class, 'index']);
    Route::post('/', [ComprasController::class, 'store']);
    Route::get('/{id}', [ComprasController::class, 'show']);
    Route::put('/{id}', [ComprasController::class, 'update']);
    Route::delete('/{id}', [ComprasController::class, 'destroy']);
});

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/inventario
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE INVENTARIO.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'inventario',
], function () {
    Route::get('/', [InventarioController::class, 'index']);
    Route::post('/', [InventarioController::class, 'store']);
    Route::get('/{id}', [InventarioController::class, 'show']);
    Route::put('/{id}', [InventarioController::class, 'update']);
    Route::delete('/{id}', [InventarioController::class, 'destroy']);
});

/*-----------------------------------------------------------------------------------------
    NOTA: ESTAS RUTAS ESTAN CREADAS POR SI ACASO, NO BORRARLAS HASTA LLEGAR A UN ACUERDO
-------------------------------------------------------------------------------------------*/
//Route::resource('sex', App\Http\Controllers\SexController::class);
//Route::resource('civil_-statu', App\Http\Controllers\Civil_StatuController::class);
//Route::resource('nationality', App\Http\Controllers\NationalityController::class);
//Route::resource('entity', App\Http\Controllers\EntityController::class);
//Route::resource('product_-category', App\Http\Controllers\Product_CategoryController::class);
//Route::resource('product', App\Http\Controllers\ProductController::class);
//Route::resource('box', App\Http\Controllers\BoxController::class);
//Route::resource('customer_-type', App\Http\Controllers\Customer_TypeController::class);
//Route::resource('customer', App\Http\Controllers\CustomerController::class);
//Route::resource('order_-type', App\Http\Controllers\Order_TypeController::class);
//Route::resource('living_-room', App\Http\Controllers\Living_RoomController::class);
//Route::resource('table', App\Http\Controllers\TableController::class);
//Route::resource('order', App\Http\Controllers\OrderController::class);
