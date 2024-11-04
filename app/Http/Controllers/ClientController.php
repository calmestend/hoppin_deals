<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a view of the branch selected.
     */

    public function indexStocks(int $branch_id)
    {
        $branch = Branch::findOrFail($branch_id);
        $stocks = Stock::where('branch_id', $branch->id)->get();

        return view('layouts.client.products', compact('stocks'));
    }

    public function branchSelection(Request $request)
    {
        $request->validate(['branch_id', 'exists:branches, id']);

        $branch = Branch::findOrFail($request->branch_id);

        return redirect()->route('client.products', ['branch_id' => $branch->id]);
    }

    /**
     * Show the form for creating a new dashboard view.
     */
    public function dashboard()
    {
        $branches = Branch::all();
        return view('layouts.client.dashboard', compact(['branches']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showProduct(int $branch_id, int $product_id)
    {
        $product = Product::findOrFail($product_id);

        $stock = Stock::where('product_id', $product->id)
                      ->where('branch_id', $branch_id)
                      ->first();

        return view('layouts.client.products.product', compact('stock'));
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
    public function destroy(string $id)
    {
        //
    }
}
