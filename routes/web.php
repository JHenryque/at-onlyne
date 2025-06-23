<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::redirect('/', 'home');
    Route::get('/', [AdminController::class, 'home'])->name('home');
});

