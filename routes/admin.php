<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('layouts.admin.dashboard');
    })->name('admin.dashboard');
});
