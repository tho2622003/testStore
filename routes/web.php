<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AddController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/create', function(){
    return view('create');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::get('/', [ProductController::class, 'index']);

Route::get('/create', [AddController::class, 'create'])->middleware('auth');
Route::post('/create', [AddController::class, 'store'])->middleware('auth');

Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('product.edit');
Route::patch('/{product}/edit', [ProductController::class, 'update'])->middleware('auth')->name('product.update');

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth')->name('logout');
