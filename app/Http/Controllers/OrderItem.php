<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderItem extends Controller
{
    //
    public function orderItem(): View
    {
        return view('order.order-item');
    }
}
