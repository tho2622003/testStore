<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterByYear($year = null)
    {
        $query = Product::select('*', DB::raw('substr(date, -4) as year'));
    
        if ($year) {
            $query->whereRaw('substr(date, -4) = ?', [$year]);
        }
        $products = $query->orderBy('year', 'asc')->get();
    
        return view('products.by_year', compact('products'));
    }
    
    public function filterByGenre($genre = null)
    {
        $validGenres = ["Pop", "Hip Hop", "Rock", "Metal", "Electronics"];
    
        $query = Product::select('*');
    
        if ($genre && in_array($genre, $validGenres)) {
            $query->where('genre', $genre);
        }
    
        $products = $query->orderBy('genre')->get();
    
        return view('products.by_genre', compact('products', 'validGenres'));
    }

    public function filterByFormat($format = null)
    {
        $validFormats = ["CD", "Vinyl", "Casette", "Digital download"];
    
        $query = Product::select('*');
    
        if ($format && in_array($format, $validFormats)) {
            $query->where('format', $format);
        }
    
        $products = $query->orderBy('format')->get();
    
        return view('products.by_format', compact('products', 'validFormats'));
    }
}
