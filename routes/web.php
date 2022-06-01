<?php

use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\InventoryController;
use App\Http\Controllers\dashboard\ProductsNew;
use App\Http\Controllers\dashboard\ProductsEgress;
use App\Http\Controllers\dashboard\ProductsIngress;
use Illuminate\Support\Facades\Route;

require_once __DIR__ . '/jetstream.php';
require_once __DIR__ . '/fortify.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'index']);
    Route::post('/products', [ProductsNew::class, 'store']);

    Route::resource('/inventory', InventoryController::class)->names('dashboard.inventory');
    Route::resource('/products-ingress', ProductsIngress::class)->names('dashboard.products-ingress');
    Route::resource('/products-egress', ProductsEgress::class)->names('dashboard.products-egress');
    Route::resource('/products', ProductsNew::class)->names('dashboard.products');
    //Route::get('dataTableProducts', [InventoryController::class, 'dataTable'])->name('dataTableProducts');
});
