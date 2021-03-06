<?php

/*------------------
    IMPORTACIONES
--------------------*/
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('registrarse', function () {
    return view('auth.register');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // ORDENES ACTIVAS //
    $activeOrders = DB::table('orders')
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->join('entities', 'customers.entity_id', '=', 'entities.id')
        ->join('order_types', 'orders.order_types_id', '=', 'order_types.id')
        ->select(
            'orders.id',
            'orders.table_id',
            'entities.first_name',
            'entities.last_name',
            'order_types.name as order_types_name',
            'orders.status'
        )
        ->where('orders.status', '=', true)
        ->get();

    $chartData = DB::table('order_products')
        ->join('products', 'order_products.product_id', '=', 'products.id')
        ->select(DB::raw("
            products.name,
            SUM(order_products.quantity) as quantity
        "))
        ->groupBy('products.name')
        ->get()
        ->take(5);

    return view('dashboard.index', compact(['activeOrders', 'chartData']));

})->name('dashboard');

Route::get('/info', function () {
    return view('info ');
});

/*--------------------
    PEDIDOS RAPIDOS
----------------------*/
require __DIR__.'/../routes/resources/PedidosRapidosResource.php';

/*---------
    CAJA
-----------*/
require __DIR__.'/../routes/resources/CajaResource.php';

/*--------------
    RECEPCION
----------------*/
require __DIR__.'/../routes/resources/RecepcionResource.php';

/*-----------
    COCINA
-------------*/
require __DIR__.'/../routes/resources/CocinaResource.php';

/*---------
    MENU
-----------*/
require __DIR__.'/../routes/resources/MenuResource.php';

/*-------------
    REPORTES
---------------*/
require __DIR__.'/../routes/resources/ReportesResource.php';

/*------------
    COMPRAS
--------------*/
require __DIR__.'/../routes/resources/ComprasResource.php';

/*---------------
    INVENTARIO
-----------------*/
require __DIR__.'/../routes/resources/InventarioResource.php';

/*--------
    SEX
----------*/
require __DIR__.'/../routes/resources/SexResource.php';

/*-----------------
    CIVIL STATUS
-------------------*/
require __DIR__.'/../routes/resources/CivilStatusResource.php';

/*----------------
    NATIONALITY
------------------*/
require __DIR__.'/../routes/resources/NationalityResource.php';

/*-----------
    ENTITY
-------------*/
require __DIR__.'/../routes/resources/EntityResource.php';

/*---------------------
    PRODUCT CATEGORY
-----------------------*/
require __DIR__.'/../routes/resources/ProductCategoryResource.php';

/*-------------
    PRODUCTS
---------------*/
require __DIR__.'/../routes/resources/ProductsResource.php';

/*--------
    BOX
----------*/
require __DIR__.'/../routes/resources/BoxResource.php';

/*-------------------
    CUSTOMER TYPES
---------------------*/
require __DIR__.'/../routes/resources/CustomerTypeResource.php';

/*--------------
    CUSTOMERS
----------------*/
require __DIR__.'/../routes/resources/CustomerResource.php';

/*----------------
    ORDER TYPES
------------------*/
require __DIR__.'/../routes/resources/OrderTypesResource.php';

/*-----------------
    LIVING ROOMS
-------------------*/
require __DIR__.'/../routes/resources/LivingRoomsResource.php';

/*----------
    MESAS
------------*/
require __DIR__.'/../routes/resources/MesasResource.php';

/*-----------
    ORDERS
-------------*/
require __DIR__.'/../routes/resources/OrdersResource.php';

/*----------------------
    TYPE RESERVATIONS
------------------------*/
require __DIR__.'/../routes/resources/TypeReservationsResource.php';

/*-----------------
    RESERVATIONS
-------------------*/
require __DIR__.'/../routes/resources/ReservationsResource.php';

/*-------------------
    ORDER PRODUCTS
---------------------*/
require __DIR__.'/../routes/resources/ReservationsResource.php';

/*----------------
    BOX HISTORY
------------------*/
require __DIR__.'/../routes/resources/BoxHistoryResource.php';

/*-----------
    PHONES
-------------*/
require __DIR__.'/../routes/resources/PhoneResource.php';

/*-----------
    EMAILS
-------------*/
require __DIR__.'/../routes/resources/EmailResource.php';

/*--------------------
    WAREHOUSE TYPES
----------------------*/
require __DIR__.'/../routes/resources/WarehouseTypesResource.php';

/*----------------
    INGREDIENTS
------------------*/
require __DIR__.'/../routes/resources/IngredientsResource.php';

/*----------------------
    UNITS MEASUREMENT
------------------------*/
require __DIR__.'/../routes/resources/UnitsMeasurementResource.php';

/*----------------------
    INGREDIENTS STOCK
------------------------*/
require __DIR__ . '/../routes/resources/IngredientsStockResource.php';

/*------------
    RECIPES
--------------*/
require __DIR__ . '/../routes/resources/RecipesResource.php';

/*---------------------------
    RECIPES VS INGREDIENTS
-----------------------------*/
require __DIR__ . '/../routes/resources/RecipesVsIngredientsResource.php';

/*---------------------
    MENU VS PRODUCTS
-----------------------*/
require __DIR__ . '/../routes/resources/MenuVsProductsResource.php';

/*--------------
    COUNTRIES
----------------*/
require __DIR__ . '/../routes/resources/CountryResource.php';

/*--------------
    PROVINCES
----------------*/
require __DIR__ . '/../routes/resources/ProvinceResource.php';

/*-----------
    CITIES
-------------*/
require __DIR__ . '/../routes/resources/CityResource.php';

/*------------
    SECTORS
--------------*/
require __DIR__ . '/../routes/resources/SectorResource.php';

/*--------------
    ADDRESSES
----------------*/
require __DIR__ . '/../routes/resources/AddressesResource.php';

/*---------------
    CURRENCIES
-----------------*/
require __DIR__ . '/../routes/resources/CurrencyResource.php';

/*-------------------
    PAYMENT METHOD
---------------------*/
require __DIR__ . '/../routes/resources/PaymentMethodResource.php';

/*-------------
    INVOICES
---------------*/
require __DIR__ . '/../routes/resources/InvoiceResource.php';

/*---------------
    WORK AREAS
-----------------*/
require __DIR__ . '/../routes/resources/WorkAreasResource.php';

/*-------------------
    EMPLOYEE TYPES
---------------------*/
require __DIR__ . '/../routes/resources/EmployeeTypeResource.php';

/*-----------
    SALARY
-------------*/
require __DIR__ . '/../routes/resources/SalaryResource.php';

/*--------------
    EMPLOYEES
----------------*/
require __DIR__ . '/../routes/resources/EmployeeResource.php';

/*---------------
    USER TYPES
-----------------*/
require __DIR__ . '/../routes/resources/UserTypesResource.php';

/*--------------
    COMPANIES
----------------*/
require __DIR__ . '/../routes/resources/CompanyResource.php';

/*--------------
    PROVIDERS
----------------*/
require __DIR__ . '/../routes/resources/ProviderResource.php';
