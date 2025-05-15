<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index() {
        $prods = Product::all();

        return response()->json([
            "success" => true,
            "data" => $prods
        ]);
    }

    public function best(){
        $bestProds = Product::with('reviews') 
            ->get() 
            ->map(function ($product) {
                
                $averageRating = $product->reviews->avg('voto');
                $product->average_rating = $averageRating; 
                if ($averageRating > 4){
                    $product->hot = true;
                }
                return $product;
            })
            ->sortByDesc('average_rating') 
            ->take(9);

        return response()->json([
            "success" => true,
            "data" => $bestProds
        ]);
    }

    public function filterCat(string $cat){
        $prods = Product::where("categoria", $cat)->get();

        return response()->json([
            "success" => true,
            "data" => $prods
        ]);
    }
}
