<?php

namespace App\Events;

use App\Http\Controllers\BasketController;
use Illuminate\Http\Request;


class OrderStore
{


    public $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

}
