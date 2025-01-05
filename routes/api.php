<?php

use App\Http\Controllers\ProductsListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Pdf;
use Illuminate\Support\Facades\Route;

Route::get('products', [ProductsListController::class, 'index']);
