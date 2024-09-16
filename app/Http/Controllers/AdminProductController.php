<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return view('admin.product.index', compact('items'));
    }

    public function edit(Product $product)
    {
        return view("admin.product.edit", ["product" => $product]);
    }
}