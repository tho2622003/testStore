<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwitchViewController extends Controller
{
    public function switch(Request $request)
    {
        $currentView = $request->session()->get('admin_view', 'products');
        $newView = $currentView === 'products' ? 'users' : 'products';
        
        $request->session()->put('admin_view', $newView);
        
        return redirect()->back();
    }
}