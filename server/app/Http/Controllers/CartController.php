<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartAddRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    private const COOKIE_NAME = 'ok_cart';

    public function add(CartAddRequest $request)
    {
        $product_id = $request->validated()['id'];

        # Unserialize cart from cookies or create new empty cart
        $cart = json_decode(Cookie::get(self::COOKIE_NAME, '{}'), true);
        
        
        # Update item amount
        if (isset($cart[$product_id])) {
            $cart[$product_id] += 1;
        } else {
            $cart[$product_id] = 1;
        }
        
        $products = Product::whereIn('id', array_keys($cart))->get();
        
        # Set up collection keys to count items amount
        $products = $products->map(
            fn($p) => ['item' => $p, 'count' => $cart[$p->getKey()]]
        );
        
        # Update cookie
        Cookie::queue(self::COOKIE_NAME, json_encode($cart));

        return view('cart', compact('products'));
    }

    public function remove(CartAddRequest $request)
    {
        $product_id = $request->validated()['id'];

        $cart = json_decode(Cookie::get(self::COOKIE_NAME, '{}'), true);
        
        # Update item amount
        if (isset($cart[$product_id])) {
            if ($cart[$product_id] <= 1) {
                unset($cart[$product_id]);
            } else {
                $cart[$product_id] -= 1;
            }
        }

        $products = Product::whereIn('id', array_keys($cart))->get();

        # Set up collection keys to count items amount
        $products = $products->map(
            fn($p) => ['item' => $p, 'count' => $cart[$p->getKey()]]
        );
        
        # Update cookie
        Cookie::queue(self::COOKIE_NAME, json_encode($cart));

        return view('cart', compact('products'));
    }

    public function buy()
    {
        Cookie::queue(Cookie::forget(self::COOKIE_NAME));

        return redirect()->route('products.index');
    }

    public function show(Request $request)
    {
        # Unserialize cart from cookies or create new empty cart
        $cart = json_decode(Cookie::get(self::COOKIE_NAME, '{}'), true);

        # Set up collection keys to count items amount
        $products = Product::whereIn('id', array_keys($cart))->get()->map(
            fn($p) => ['item' => $p, 'count' => $cart[$p->getKey()]]
        );


        return view('cart', compact('products'));
    }
}
