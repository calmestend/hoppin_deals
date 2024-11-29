<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Payment;
use App\Models\Sale;
use App\Models\SaleStock;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public static function create()
    {
        $cities = City::all();
        $cart = session()->get('cart', []);
        $total = 0;
        $paymentCreated = false;
        $saleId = 0;
        $cartItems = [];
        foreach ($cart as $stockId => $item) {
            $stock = Stock::findOrFail($stockId);
            $cartItems[] = [
                'stock' => $stock,
                'quantity' => $item['quantity'],
                'subtotal' => $stock->product->price * $item['quantity']
            ];
            $total += $stock->product->price * $item['quantity'];
            if (!$paymentCreated) {
                $payment = Payment::create(['amount' => $total]);
                $sale = Sale::create([
                    'client_id' => Auth::user()->client->id,
                    'payment_id' => $payment->id
                ]);

                $saleId = $sale->id;
                $paymentCreated = true;
            }

            $stock->quantity -= $item['quantity'];
            $stock->save();
            SaleStock::create([
                'sale_id' => $saleId,
                'stock_id' => $stock->id,
                'quantity' => $item['quantity']
            ]);
        };

        session()->flash('success', 'Transaction complete');
        session()->forget('cart');

        return view('layouts.client.checkout', compact(['cities', 'cartItems']));
    }
}
