<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColaboratorsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfirmAccountController;


Route::middleware('auth')->group(function () {
Route::get('/confirm-account/{id}', [ConfirmAccountController::class, 'confirmAccount'])->name('confirm-account');
    // pifile
    Route::redirect('/', 'home');
    Route::get('/', [AdminController::class, 'home'])->name('home');
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/user/profile/update-password', [ProfileController::class, 'updatePassword'])->name('user.profile.update-password');
    Route::post('/user/profile/update-user-data', [ProfileController::class, 'profileUserChangeData'])->name('user.profile.update-user-data');

    // departments
    Route::get('/department', [DepartmentController::class, 'index'])->name('departments');

    // colaboradores
    Route::get('/colaborators', [ColaboratorsController::class, 'index'])->name('colaborators');
    Route::get('/colaborators/new-colaborator', [ColaboratorsController::class, 'newColaborator'])->name('colaborators.new-colaborator');
    Route::post('colaborators/create', [ColaboratorsController::class, 'createColarator'])->name('colaborators.create');

    // empreendedor


    // plano pagamento
});

