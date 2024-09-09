<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("index", ["products" => $products]);
    }

    public function show(Product $product)
    {
        return view("show", ["product" => $product]);
    }

    public function edit(Product $product)
    {
        return view("edit", ["product" => $product]);
    }
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'date' => 'required|date',
            'format' => 'required',
            'genre' => 'required',
        ]);
    
        $product->update($validated);
    
        return redirect()->route('product.show', $product);
    }
}
