<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        //
    });
});
