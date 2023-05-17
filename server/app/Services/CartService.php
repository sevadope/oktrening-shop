<?php

namespace App\Services;

use App\Dto\CartItem;
use App\Models\Product;
use Illuminate\Support\Collection;

class CartService
{
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItems(): Collection
    {
        $products = Product::whereIn('id', array_keys($this->items))->get();

        $items = $products->map(
            fn($p) => new CartItem($p, $this->items[$p->getKey()])
        );

        return $items;
    }

    public function addProduct(int $product_id)
    {
        if (isset($this->items[$product_id])) {
            $this->items[$product_id] += 1;
        } else {
            $this->items[$product_id] = 1;
        }
    }

    public function removeProduct(int $product_id)
    {
        if (isset($this->items[$product_id])) {
            if ($this->items[$product_id] <= 1) {
                unset($this->items[$product_id]);
            } else {
                $this->items[$product_id] -= 1;
            }
        }
    }

    public function toString(): string
    {
        return json_encode($this->items);
    }
}