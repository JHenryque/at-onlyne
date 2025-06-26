<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    // pifile
    Route::redirect('/', 'home');
    Route::get('/', [AdminController::class, 'home'])->name('home');
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/user/profile/update-password', [ProfileController::class, 'updatePassword'])->name('user.profile.update-password');
    Route::post('/user/profile/update-user-data', [ProfileController::class, 'profileUserChangeData'])->name('user.profile.update-user-data');

    // departments
    Route::get('/department', [DepartmentController::class, 'index'])->name('departments');

});

