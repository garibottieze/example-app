<?php

use Illuminate\Support\Facades\Route;

Route::prefix('common')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        //
    });
});
