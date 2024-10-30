<?php

use App\Http\Controllers\Auth\RegisteredAdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('layouts.admin.dashboard');
    })->name('admin.dashboard');

    Route::get('admin/users', function () {
        return view('layouts.admin.users');
    })->name('admin.users');

    Route::get('admin/users/admin-register', [RegisteredAdminController::class, 'create'])->name('admin.users.register-admin');
    Route::post('admin/users/admin-register', [RegisteredAdminController::class, 'store'])->name('admin.register');
});
