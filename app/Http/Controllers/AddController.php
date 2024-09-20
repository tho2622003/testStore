<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class AddController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $seed = fake()->randomNumber(5, false);
        $productAtrr = $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'date' => 'required',
            'genre' => 'required',
            'format' => 'required',
        ]);
        $productAtrr["cover_sm"] = "https://picsum.photos/seed/" . $seed . "/150";
        $productAtrr["cover_lg"] = "https://picsum.photos/seed/" . $seed . "/300";
        $product = Product::create($productAtrr);
        $product->user_id = Auth::id();
        $product->save();

        return redirect('/');
    }
}
