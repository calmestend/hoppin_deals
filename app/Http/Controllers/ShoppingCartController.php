<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        };
        return view('layouts.client.shopping_cart', compact(['cart', 'cartItems', 'total']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $stock_id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$stock_id])) {
            unset($cart[$stock_id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('message', 'Product removed successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'stock_id' => ['required'],
        ]);

        $stock = Stock::findOrFail($request->stock_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$stock->id])) {
            $request->validate([
                'quantity' => [
                    'required',
                    'integer',
                    'max:' . ($stock->quantity - $cart[$stock->id]['quantity']),
                    'min:1'
                ]
            ], [
                'quantity.required' => 'Please provide a quantity.',
                'quantity.integer' => 'Quantity must be a valid integer.',
                'quantity.max' => 'The quantity cannot exceed the available stock minus the quantity already in the cart.',
                'quantity.min' => 'The minimum quantity is 1.',
            ]);

            $cart[$stock->id]['quantity'] += $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('message', 'Product added successfully, product name: ' . $stock->product->name . ' quantity in cart: ' . $cart[$stock->id]['quantity']);
        }

        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'max:' . $stock->quantity,
                'min:1'
            ]
        ], [
            'quantity.required' => 'Please provide a quantity.',
            'quantity.integer' => 'Quantity must be a valid integer.',
            'quantity.max' => 'The quantity cannot exceed the available stock.',
            'quantity.min' => 'The minimum quantity is 1.',
        ]);

        $cart[$stock->id] = ['quantity' => (int) $request->quantity];
        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Product added successfully, product name: ' . $stock->product->name . ' quantity in cart: ' . $cart[$stock->id]['quantity']);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

}
