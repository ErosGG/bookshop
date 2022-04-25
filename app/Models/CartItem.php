<?php

namespace App\Models;


class CartItem
{
    public Product $product;
    public int $quantity;


    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }
}
