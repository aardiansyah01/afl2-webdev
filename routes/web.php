<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProductController;

Route::prefix('products')
    ->controller(ProductController::class)
    ->group(function () {

        //List
        Route::get('/', 'index')->name('products');

        //Form creat
        Route::get('/create', 'create')->name('products.create');

        //store
        Route::post('/store', 'store')->name('products.store');

        //Form edit
        Route::get('/edit/{id}', 'edit')->name('products.edit');

        // Update
        Route::post('/update/{id}', 'update')->name('products.update');

        //halaman detail
        Route::get('/show/{id}', 'show')->name('products.show');
});
