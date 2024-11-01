<?php

use App\Http\Controllers\Auth\RegisteredAdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
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

    Route::get('admin/branches/', [BranchController::class, 'index'])->name('admin.branches');
    Route::get('admin/branches/create', [BranchController::class, 'create'])->name('admin.branches.create');
    Route::post('admin/branches/store', [BranchController::class, 'store'])->name('admin.branches.store');
    Route::post('admin/branches/destroy', [BranchController::class, 'destroy'])->name('admin.branches.destroy');
    Route::post('admin/branches/{id}/edit', [BranchController::class, 'edit'])->name('admin.branches.edit');
    Route::post('admin/branches/{id}/update', [BranchController::class, 'update'])->name('admin.branches.update');

    Route::get('admin/categories/', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::post('admin/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::post('admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('admin/categories/{id}/update', [CategoryController::class, 'update'])->name('admin.categories.update');

});
