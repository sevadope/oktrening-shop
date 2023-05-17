<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartAddRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    private const COOKIE_NAME = 'ok_cart';

    public function add(CartAddRequest $request)
    {
        $product_id = $request->validated()['id'];

        # Unserialize cart from cookies or create new empty cart
        $cart = json_decode(Cookie::get(self::COOKIE_NAME, '{}'), true);

        $cart_service = new CartService($cart);
        $cart_service->addProduct($product_id);

        $items = $cart_service->getItems();
        
        # Update cookie
        Cookie::queue(self::COOKIE_NAME, $cart_service->toString());

        return view('cart', compact('items'));
    }

    public function remove(CartAddRequest $request)
    {
        $product_id = $request->validated()['id'];

        # Unserialize cart from cookies or create new empty cart
        $cart = json_decode(Cookie::get(self::COOKIE_NAME, '{}'), true);
        
        $cart_service = new CartService($cart);
        $cart_service->removeProduct($product_id);

        $items = $cart_service->getItems();
        
        # Update cookie
        Cookie::queue(self::COOKIE_NAME, $cart_service->toString());

        return view('cart', compact('items'));
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

        $cart_service = new CartService($cart);
        $items = $cart_service->getItems();

        return view('cart', compact('items'));
    }
}
