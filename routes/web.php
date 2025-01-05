<?php

use App\Http\Controllers\ProductsListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('products/web', [ProductsListController::class, 'indexWeb'])->name('products.index-web');
Route::get('products/create', [ProductsListController::class, 'create'])->name('products.create');
Route::post('products', [ProductsListController::class, 'store'])->name('products.store');
Route::get('products/edit/{product}', [ProductsListController::class, 'edit'])->name('products.edit');
Route::put('products/{product}', [ProductsListController::class, 'update'])->name('products.update');  // Changed to PUT
Route::delete('products/{product}', [ProductsListController::class, 'destroy'])->name('products.destroy');  // Changed to DELETE
