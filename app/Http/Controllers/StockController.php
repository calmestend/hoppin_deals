<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('layouts.admin.stocks', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $products = Product::all();
        return view('layouts.admin.stocks.create', compact(['branches', 'products']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'branch_id' => ['required'],
            'product_id' => ['required'],
            'quantity' => ['required', 'integer', 'max:99999', 'min:1']
        ]);

        Stock::create([
            'branch_id' => $request->branch_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return redirect(route("admin.stocks", absolute: false));
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
        $stock = Stock::findOrFail($id);
        $branches = Branch::all();
        $products = Product::all();
        return view('layouts.admin.stocks.edit', compact(['branches', 'products', 'stock']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->update($request->only(['branch_id', 'product_id', 'quantity']));

        return redirect()->route('admin.stocks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return redirect()->route('admin.stocks');
    }
}
