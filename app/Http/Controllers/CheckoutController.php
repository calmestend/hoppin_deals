<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Stock;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public static function create()
    {
        $cities = City::all();
        $cart = session()->get('cart', []);
        $total = 0;
        $cartItems = [];
        foreach ($cart as $stockId => $item) {
            $stock = Stock::findOrFail($stockId);
            $cartItems[] = [
                'stock' => $stock,
                'quantity' => $item['quantity'],
                'subtotal' => $stock->product->price * $item['quantity']
            ];
            $total += $stock->product->price * $item['quantity'];

            $stock->quantity -= $item['quantity'];
            $stock->save();
        };

        session()->flash('success', 'Transaction complete');
        session()->forget('cart');

        return view('layouts.client.checkout', compact(['cities', 'cartItems']));
    }
}
