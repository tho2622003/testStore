<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class SwitchViewController extends Controller
{
    public function index(Request $request)
    {
        $view = $request->session()->get('admin_view', 'products');
        
        if ($view === 'products') {
            $items = Product::all();
        } else {
            $items = User::all();
        }
        
        return view('admin.index', compact('items', 'view'));
    }

    public function switch(Request $request)
    {
        $currentView = $request->session()->get('admin_view', 'products');
        $newView = $currentView === 'products' ? 'users' : 'products';
        
        $request->session()->put('admin_view', $newView);
        
        return redirect()->route('admin.index');
    }
}