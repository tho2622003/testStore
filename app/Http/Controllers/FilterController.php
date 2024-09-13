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
        $message = null;

        if ($year) {
            $query->whereRaw('substr(date, -4) = ?', [$year]);
        }

        $products = $query->orderBy('year', 'asc')->get();

        if ($products->isEmpty()) {
            $message = "No product found with specified year. Try again.";
        }

        return view('products.by_year', compact('products', 'message'));
    }
    public function filterByGenre($genre = null)
    {
        $query = Product::select('*');

        if ($genre) {
            $query->where('genre', $genre);
        }

        $products = $query->orderBy('genre')->get();

        return view('products.by_genre', compact('products'));
    }

    public function filterByFormat($format = null)
    {
        $query = Product::select('*');

        if ($format) {
            $query->where('format', $format);
        }

        $products = $query->orderBy('format')->get();

        return view('products.by_format', compact('products'));
    }

    public function getFilterOptions($type)
    {
        switch ($type) {
            case 'genre':
                return response()->json(["Pop", "Hip Hop", "Rock", "Metal", "Electronics"]);
            case 'format':
                return response()->json(["CD", "Vinyl", "Casette", "Digital download"]);
            default:
                return response()->json([]);
        }
    }
}
