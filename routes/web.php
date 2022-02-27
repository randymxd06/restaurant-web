<?php

/*------------------
    IMPORTACIONES
--------------------*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\CocinaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidosRapidosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\SexController;
use App\Http\Controllers\CivilStatuController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\CustomerTypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderTypeController;
use App\Http\Controllers\LivingRoomController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\OrderController;

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
    return view('auth.register ');
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
    'prefix' => 'pedidos_rapidos',
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

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/inventario
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE INVENTARIO.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'inventario',
], function () {
    Route::get('/', [InventarioController::class, 'index']);
    Route::post('/', [InventarioController::class, 'store']);
    Route::get('/{id}', [InventarioController::class, 'show']);
    Route::put('/{id}', [InventarioController::class, 'update']);
    Route::delete('/{id}', [InventarioController::class, 'destroy']);
});

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/sex
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS SEXOS.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'sex',
], function () {
    Route::get('/', [SexController::class, 'index']);
    Route::post('/', [SexController::class, 'store']);
    Route::get('/{id}', [SexController::class, 'show']);
    Route::put('/{id}', [SexController::class, 'update']);
    Route::delete('/{id}', [SexController::class, 'destroy']);
});

/*-----------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/civil_status
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS ESTADOS CIVILES.
-------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'civil_status',
], function () {
    Route::get('/', [CivilStatuController::class, 'index']);
    Route::post('/', [CivilStatuController::class, 'store']);
    Route::get('/{id}', [CivilStatuController::class, 'show']);
    Route::put('/{id}', [CivilStatuController::class, 'update']);
    Route::delete('/{id}', [CivilStatuController::class, 'destroy']);
});

/*----------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/nationality
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS NACIONALIDADES.
------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'nationality',
], function () {
    Route::get('/', [NationalityController::class, 'index']);
    Route::post('/', [NationalityController::class, 'store']);
    Route::get('/{id}', [NationalityController::class, 'show']);
    Route::put('/{id}', [NationalityController::class, 'update']);
    Route::delete('/{id}', [NationalityController::class, 'destroy']);
});

/*-----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/entities
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS ENTIDADES.
-------------------------------------------------------------------*/
Route::group([
    'prefix' => 'entities',
], function () {
    Route::get('/', [EntityController::class, 'index']);
    Route::post('/', [EntityController::class, 'store']);
    Route::get('/{id}', [EntityController::class, 'show']);
    Route::put('/{id}', [EntityController::class, 'update']);
    Route::delete('/{id}', [EntityController::class, 'destroy']);
});

/*-----------------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/product_category
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS CATEGORIAS DE LOS PRODUCTOS.
-------------------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'product_category',
], function () {
    Route::get('/', [ProductCategoryController::class, 'index']);
    Route::post('/', [ProductCategoryController::class, 'store']);
    Route::get('/{id}', [ProductCategoryController::class, 'show']);
    Route::put('/{id}', [ProductCategoryController::class, 'update']);
    Route::delete('/{id}', [ProductCategoryController::class, 'destroy']);
});

/*-----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/products
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS PRODUCTOS.
-------------------------------------------------------------------*/
Route::group([
    'prefix' => 'products',
], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/', [ProductController::class, 'store']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/box
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS CAJAS.
---------------------------------------------------------------*/
//Route::group([
//    'prefix' => 'box',
//], function () {
//    Route::get('/', [BoxController::class, 'index']);
//    Route::post('/', [BoxController::class, 'store']);
//    Route::get('/{id}', [BoxController::class, 'show']);
//    Route::put('/{id}', [BoxController::class, 'update']);
//    Route::delete('/{id}', [BoxController::class, 'destroy']);
//});

/*-------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/customer_type
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS TIPOS DE CLIENTES.
---------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'customer_type',
], function () {
    Route::get('/', [CustomerTypeController::class, 'index']);
    Route::post('/', [CustomerTypeController::class, 'store']);
    Route::get('/{id}', [CustomerTypeController::class, 'show']);
    Route::put('/{id}', [CustomerTypeController::class, 'update']);
    Route::delete('/{id}', [CustomerTypeController::class, 'destroy']);
});

/*----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/customer
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS CLIENTES.
------------------------------------------------------------------*/
Route::group([
    'prefix' => 'customer',
], function () {
    Route::get('/', [CustomerController::class, 'index']);
    Route::post('/', [CustomerController::class, 'store']);
    Route::get('/{id}', [CustomerController::class, 'show']);
    Route::put('/{id}', [CustomerController::class, 'update']);
    Route::delete('/{id}', [CustomerController::class, 'destroy']);
});

/*------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/order_type
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS TIPOS DE ORDENES.
--------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'order_type',
], function () {
    Route::get('/', [OrderTypeController::class, 'index']);
    Route::post('/', [OrderTypeController::class, 'store']);
    Route::get('/{id}', [OrderTypeController::class, 'show']);
    Route::put('/{id}', [OrderTypeController::class, 'update']);
    Route::delete('/{id}', [OrderTypeController::class, 'destroy']);
});

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/living_room
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS SALONES.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'living_room',
], function () {
    Route::get('/', [LivingRoomController::class, 'index']);
    Route::post('/', [LivingRoomController::class, 'store']);
    Route::get('/{id}', [LivingRoomController::class, 'show']);
    Route::put('/{id}', [LivingRoomController::class, 'update']);
    Route::delete('/{id}', [LivingRoomController::class, 'destroy']);
});

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/mesas
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS MESAS.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'mesas',
], function () {
    Route::get('/', [TableController::class, 'index']);
    Route::get('/create', [TableController::class, 'create']);
    Route::post('/store', [TableController::class, 'store']);
    Route::get('/{id}', [TableController::class, 'show']);
    Route::put('/{id}', [TableController::class, 'update']);
    Route::delete('/{id}', [TableController::class, 'destroy']);
});

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/orders
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS ORDENES.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'orders',
], function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
    Route::get('/{id}', [OrderController::class, 'show']);
    Route::put('/{id}', [OrderController::class, 'update']);
    Route::delete('/{id}', [OrderController::class, 'destroy']);
});
