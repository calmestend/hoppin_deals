<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('layouts.admin.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('layouts.admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "category_id" => [ "required" ],
            "name" => [ "required", "string", "max:255"  ],
            "description" => [ "required", "string", "max:255" ],
            "thumb" => ['required', 'image'],
            "cost" => [ "required", "integer", "max:99999", "min:1" ],
            "price" => [ "required", "integer", "max:99999", "min:1" ],
        ]);


        $product  = Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'cost' => $request->cost,
            'price' => $request->price,
        ]);

        $productMedia = Product::find($product->id);
        $productMedia->addMediaFromRequest('thumb')->toMediaCollection('thumb');

        return redirect(route("admin.products", absolute: false));
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('layouts.admin.products.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "category_id" => [ "required" ],
            "name" => [ "required", "string", "max:255"  ],
            "description" => [ "required", "string", "max:255" ],
            "thumb" => ['required', 'image'],
            "cost" => [ "required", "integer", "max:99999", "min:1" ],
            "price" => [ "required", "integer", "max:99999", "min:1" ],
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            "category_id" => $request->category_id,
            "name" => $request->name,
            "description" => $request->description,
            "thumb" => $request->thumb,
            "cost" => $request->cost,
            "price" => $request->price
        ]);

        if ($request->hasFile('thumb') && $product->hasMedia('thumb')) {
            $product->clearMediaCollection('thumb');
            $product->addMediaFromRequest('thumb')->toMediaCollection('thumb');
        }

        return redirect()->route('admin.products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products');
    }
}
