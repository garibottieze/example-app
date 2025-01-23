<?php

use Illuminate\Support\Facades\Route;
use Modules\Products\Http\Controllers\CategoryController;
use Modules\Products\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);

    Route::prefix('products')->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('/detail', 'show');
            Route::put('/', 'update');
            Route::delete('/', 'delete');
        });
    });
});
