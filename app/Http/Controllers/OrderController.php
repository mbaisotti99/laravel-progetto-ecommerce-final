<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout(){
        $order = Auth::user()->order;
        $addresses = Auth::user()->addresses;

        return view("order.checkout", compact("order", "addresses"));
    }
}
