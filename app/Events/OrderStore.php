<?php

namespace App\Events;

use App\Http\Controllers\BasketController;
use App\Models\Product;
use Illuminate\Http\Request;


class OrderStore
{


    public $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

}
