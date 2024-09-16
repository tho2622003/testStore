<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $items = User::all();
        return view('admin.user.index', compact('items'));
    }

    public function edit(User $user)
    {
        return view("admin.user.edit", ["user" => $user]);
    }
}