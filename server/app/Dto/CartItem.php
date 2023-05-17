<?php

namespace App\Dto;

use App\Models\Product;
use Spatie\LaravelData\Data;

class CartItem extends Data
{
    public function __construct(
        public Product $product,
        public int $count,
    ) {
    }
}