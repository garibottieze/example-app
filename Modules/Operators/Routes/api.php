<?php

use Illuminate\Support\Facades\Route;

Route::prefix('operators')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        //
    });
});
