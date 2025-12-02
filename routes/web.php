<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProductController;

Route::prefix('products')
    ->controller(ProductController::class)
    ->group(function () {

        // List Produk
        Route::get('/', 'index')->name('products.index');

        // Form create
        Route::get('/create', 'create')->name('products.create');

        // Store
        Route::post('/store', 'store')->name('products.store');

        // Edit form
        Route::get('/edit/{id}', 'edit')->name('products.edit');

        // Update
        Route::put('/update/{id}', 'update')->name('products.update');

        // Detail
        Route::get('/show/{id}', 'show')->name('products.show');
    });
