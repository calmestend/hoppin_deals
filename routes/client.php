<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('client/dashboard', function () {
        return view('layouts.client.dashboard');
    })->name('client.dashboard');
});
