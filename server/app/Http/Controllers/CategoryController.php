<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private const PER_PAGE = 20;

    public function show(Category $category)
    {
        $category->load([
            'descendants.products' => fn($q) => $q->orderBy('priority')->limit(self::PER_PAGE)
        ]);

        $products = $category->products->merge(
            $category->descendants->map(fn($c) => $c->products)->flatten()
        );

        return view('index', [
            'products' => $products,
            'categories' => $category->children, 
            'back' => true
        ]);
    }
}
