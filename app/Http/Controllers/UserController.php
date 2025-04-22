<?php

namespace App\Http\Controllers;

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
}




