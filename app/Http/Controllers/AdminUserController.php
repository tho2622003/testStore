<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index()
    {
        $items = User::all();
        return view('admin.user.index', compact('items'));
    }

    public function create()
    {
        return view("admin.user.create");
    }

    public function edit(User $user)
    {
        return view("admin.user.edit", ["user" => $user]);
    }

    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'created_at' => 'required|date',
            'is_admin' => 'required|in:Yes,No',
        ]);

        $user->name = $attributes['name'];
        $user->username = $attributes['username'];
        $user->created_at = $attributes['created_at'];
        $user->is_admin = $attributes['is_admin'] === 'Yes' ? 1 : 0;

        $user->save();

        return redirect()->route('admin.index')->with('success', 'User updated successfully');
    }
    public function store(Request $request)
    {
        $userAttr = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'is_admin' => 'required|in:0,1',
        ]);

        $userAttr['password'] = bcrypt($userAttr['password']);

        $user = User::create($userAttr);

        return redirect()->route('admin.index')->with('success', 'User created successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin')->with('success', 'Product deleted successfully');
    }
}
