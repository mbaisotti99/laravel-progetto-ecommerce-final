<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function details()
    {
        $user = Auth::user();
        return view("user.details", compact("user"));
    }

    public function orders()
    {
        $user = Auth::user();

        return view("user.orders", compact("user"));
    }
    public function cart()
    {
        $user = Auth::user();

        return view("user.cart", compact("user"));
    }

    public function addToCart(Product $prod, Request $req)
    {
        $user = Auth::user();
        $size = $req->taglia;

        if (!isset($user->order)) {
            $newOrder = new Order();
            $newOrder->user_id = $user->id;
            $newOrder->save();

            $newOrder->products()->attach($prod, ["taglia" => $size]);
        } else {
            $existingProd = $user->order->products->filter(function ($item) use ($prod, $size) {
                return $item->id == $prod->id && $item->pivot->taglia == $size;
            })->first();
            if ($existingProd) {
                DB::table('order_product')
                    ->where('order_id', $user->order->id)
                    ->where('product_id', $prod->id)
                    ->where('taglia', $size)
                    ->update([
                        'quantita' => $existingProd->pivot->quantita + 1
                    ]);
                
            }else{

                $user->order->products()->attach($prod, ["taglia" => $size]);
                
            }
        }

        return redirect(route("user.cart", compact("user")));
    }
}




