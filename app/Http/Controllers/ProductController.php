<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index (){
        $prods = Product::paginate(10);
        return view("products.index", compact("prods"));
    }

    public function filtered ($cat){
        $prods = Product::where("categoria", $cat)->get();
        return view("products.filtered", compact("prods", "cat")    );
    }
}
