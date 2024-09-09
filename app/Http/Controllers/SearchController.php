<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $products=Product::query()->where('title', 'LIKE', '%'.request('query').'%')->get();
        return view('results', ["products"=>$products]);
    }
}
