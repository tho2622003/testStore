<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $view = $request->session()->get('admin_view', 'products');
        
        if ($view === 'products') {
            $items = Product::all();
            return view('admin.products', compact('items'));
        } else {
            $items = User::all();
            return view('admin.users', compact('items'));
        }

        return view('admin.'.$view, compact('items', 'view'));
    }
}