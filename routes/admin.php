<?php

use App\Http\Controllers\Auth\RegisteredAdminController;
use App\Http\Controllers\Auth\RegisteredClientController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('layouts.admin.dashboard');
    })->name('admin.dashboard');

    Route::get('admin/users', function () {
        return view('layouts.admin.users');
    })->name('admin.users');

    Route::get('admin/users/admin-register', [RegisteredAdminController::class, 'create'])->name('admin.users.register.admin');
    Route::post('admin/users/admin-register', [RegisteredAdminController::class, 'store'])->name('admin.register');

    Route::get('admin/users/client-register', [RegisteredClientController::class, 'create'])->name('admin.users.register.client');
    Route::post('admin/users/client-register', [RegisteredClientController::class, 'store'])->name('client.register');

    // Branches
    Route::get('admin/branches/', [BranchController::class, 'index'])->name('admin.branches');
    Route::get('admin/branches/create', [BranchController::class, 'create'])->name('admin.branches.create');
    Route::post('admin/branches/store', [BranchController::class, 'store'])->name('admin.branches.store');
    Route::post('admin/branches/destroy', [BranchController::class, 'destroy'])->name('admin.branches.destroy');
    Route::post('admin/branches/{id}/edit', [BranchController::class, 'edit'])->name('admin.branches.edit');
    Route::post('admin/branches/{id}/update', [BranchController::class, 'update'])->name('admin.branches.update');

    // Categories
    Route::get('admin/categories/', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::post('admin/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::post('admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('admin/categories/{id}/update', [CategoryController::class, 'update'])->name('admin.categories.update');

    // Products
    Route::get('admin/products/', [ProductController::class, 'index'])->name('admin.products');
    Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::post('admin/products/{id}/destroy', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::post('admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('admin/products/{id}/update', [ProductController::class, 'update'])->name('admin.products.update');

    // Stocks
    Route::get('admin/stocks/', [StockController::class, 'index'])->name('admin.stocks');
    Route::get('admin/stocks/create', [StockController::class, 'create'])->name('admin.stocks.create');
    Route::post('admin/stocks/store', [StockController::class, 'store'])->name('admin.stocks.store');
    Route::post('admin/stocks/{id}/destroy', [StockController::class, 'destroy'])->name('admin.stocks.destroy');
    Route::post('admin/stocks/{id}/edit', [StockController::class, 'edit'])->name('admin.stocks.edit');
    Route::post('admin/stocks/{id}/update', [StockController::class, 'update'])->name('admin.stocks.update');
});
