<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function details(){
        $user = Auth::user();
        return view("user.details", compact("user"));
    }
    
    public function orders(){
        $user = Auth::user();
        
        return view("user.orders", compact("user"));
    }
    public function cart(){
        $user = Auth::user();
        
        return view("user.cart", compact("user"));
    }

    public function addToCart(Product $prod){
        $user = Auth::user();
        
        if (!isset($user->order)){
            $newOrder = new Order();
            $newOrder->products()->attach($prod);
            $newOrder->user_id = $user->id;
            
            $newOrder->save();
        } else{
            if ($user->order->products->contains($prod)){
                $prod->quantita++;
            }else{
                $prod->quantita = 1;
            }
            $user->order->products()->attach($prod);
        }

        return redirect(route("user.cart", compact("user")));
    }
}




