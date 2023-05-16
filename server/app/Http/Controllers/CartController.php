<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartAddRequest;

class CartController extends Controller
{
    public function add(CartAddRequest $request)
    {
        $product_id = $request->validated()['product_id'];
    }

    public function show(Request $request)
    {
        
    }
}
