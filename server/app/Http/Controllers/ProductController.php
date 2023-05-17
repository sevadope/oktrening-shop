<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    private const PER_PAGE = 20;

    public function index(Request $request)
    {
        $products = Product::orderBy('priority')->limit(self::PER_PAGE)->get();
        $categories = Category::where('parent_id', null)->get();

        return view('index', compact('products', 'categories'));
    }
}
