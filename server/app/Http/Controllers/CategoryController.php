<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $category->load('descendants.products');
        return view('index', [
            'products' => $category->products->merge($category->descendants->map(fn($c) => $c->products)->flatten()),
            'categories' => $category->children, 
            'back' => true
        ]);
    }
}
