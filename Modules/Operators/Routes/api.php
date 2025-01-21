<?php

use Illuminate\Support\Facades\Route;
use Modules\Operators\Http\Controllers\OperatorsController;

Route::prefix('operators')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::controller(OperatorsController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('/detail', 'show');
            Route::put('/', 'update');
            Route::delete('/', 'delete');
        });
    });
});
