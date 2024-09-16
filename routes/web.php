<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\SwitchViewController;
use App\Http\Controllers\AdminUserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::get('/', [ProductController::class, 'index']);

Route::get('/create', [AddController::class, 'create'])->middleware('auth');
Route::post('/create', [AddController::class, 'store'])->middleware('auth');

Route::get('/search', SearchController::class);

Route::get('/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('product.edit');
Route::patch('/{product}/edit', [ProductController::class, 'update'])->middleware('auth')->name('product.update');

Route::get('/products/by-year/{year?}', [FilterController::class, 'filterByYear'])->name('products.by_year');
Route::get('/products/by-genre/{genre?}', [FilterController::class, 'filterByGenre'])->name('products.by_genre');
Route::get('/products/by-format/{format?}', [FilterController::class, 'filterByFormat'])->name('products.by_format');

Route::get('/filter-options/{type}', [FilterController::class, 'getFilterOptions']);

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [SwitchViewController::class, 'index'])->name('admin.index');
    Route::post('/switch', [SwitchViewController::class, 'switch'])->name('switch');
    
    Route::get('/product/create', [AdminProductController::class, 'create'])->name('admin.product.create');
    Route::get('/user/create', [AdminUserController::class, 'create'])->name('admin.user.create');

    Route::post('/', [AdminProductController::class, 'store'])->name('admin.product.store');
    Route::post('/', [AdminUserController::class, 'store'])->name('admin.user.store');

    Route::get('/product/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::get('/user/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.user.edit');

    Route::put('/product/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');
    Route::put('/user/{user}', [AdminUserController::class, 'update'])->name('admin.user.update');

    Route::delete('/product/{product}', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');
    Route::delete('/product/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');

    Route::post('/switch', [SwitchViewController::class, 'switch'])->name('switch');
});

Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');