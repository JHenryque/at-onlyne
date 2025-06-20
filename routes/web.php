<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $admin = \App\Models\User::with('userAddress','departments')->find(1);

    return view('home', compact('admin'));
});
