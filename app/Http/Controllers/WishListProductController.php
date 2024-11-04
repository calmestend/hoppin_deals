<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\WishList;
use App\Models\WishListProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wish_list_id = Auth::user()->client->wish_list->id;
        $wish_list = WishList::findOrFail($wish_list_id);
        $wish_list_products = WishListProduct::where('wish_list_id', $wish_list->id)->get();

        return view('layouts.client.wish_list', compact('wish_list_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingWish = WishListProduct::where('stock_id', $request->stock_id)
                           ->where('wish_list_id', Auth::user()->client->wish_list->id)
                           ->first();

        if ($existingWish) {
            return redirect()->back()->with('message', 'This product already exists in your wish list.');
        }

        WishListProduct::create([
            'stock_id' => $request->stock_id,
            'wish_list_id' =>  Auth::user()->client->wish_list->id
        ]);

        return redirect()->back()->with('message', 'Producted added successfully.');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $wish_list_product_id)
    {
        $wish_list_product = WishListProduct::findOrFail($wish_list_product_id);
        $wish_list_product->delete();
        return redirect()->back()->with('message', 'Producted removed successfully.');
    }
}
