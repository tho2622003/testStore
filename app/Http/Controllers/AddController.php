<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AddController extends Controller
{
    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $productAtrr = $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'date' => 'required',
            'genre' => 'required',
            'format' => 'required',
        ]);
        $product = Product::create($productAtrr);
        return redirect('/');
    }
}
