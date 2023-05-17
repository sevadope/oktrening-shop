<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', [ProductController::class, 'index'])->name('products.index');

Route::get('cart', [CartController::class, 'show'])->name('cart.show');
Route::get('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('cart/buy', [CartController::class, 'buy'])->name('cart.buy');

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');