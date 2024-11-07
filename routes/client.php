<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\WishListProductController;
use App\Http\Controllers\PaypalController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('client/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');

    // Branch
    Route::post('client/branch', [ClientController::class, 'branchSelection'])->name('client.branch');
    Route::get('client/{branch_id}/products', [ClientController::class, 'indexStocks'])->name('client.products');
    Route::get('client/{branch_id}/products/{product_id}', [ClientController::class, 'showProduct'])->name('client.product');

    // Wish List
    Route::get('client/wish_list', [WishListProductController::class, 'index'])->name('client.wishlist');
    Route::post('client/wish_list', [WishListProductController::class, 'store'])->name('client.wishlist.store');
    Route::post('client/wish_list/{wish_list_product_id}', [WishListProductController::class, 'destroy'])->name('client.wishlist.destroy');

    // Shopping Cart
    Route::get('client/shopping_cart/', [ShoppingCartController::class, 'index'])->name('client.shopping_cart');
    Route::post('client/shopping_cart/', [ShoppingCartController::class, 'store'])->name('client.shopping_cart.store');
    Route::post('client/shopping_cart/{stock_id}', [ShoppingCartController::class, 'destroy'])->name('client.shopping_cart.destroy');

    // Payment
    Route::get('paypal/payment', [PaypalController::class, 'payment'])->name('paypal.payment');
    Route::get('paypal/payment/success', [PaypalController::class, 'paymentSuccess'])->name('paypal.payment.success');
    Route::get('paypal/payment/cancel', [PaypalController::class, 'paymentCancel'])->name('paypal.payment.cancel');

    // Invoice
    Route::post('/checkout/invoice', [InvoiceController::class, 'create'])->name('checkout.invoice');
});
