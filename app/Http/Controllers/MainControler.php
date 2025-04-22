<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainControler extends Controller
{
    public function home(){
        $prods = Product::all();
        $bestProds = [];
        foreach ($prods as $prod){

            $revs = $prod->reviews;
            $somma = 0;
            foreach($revs as $rev){
                $somma += $rev->voto;
            }
            $avg = $somma / count($revs);

            if ($avg >= 3){
                $bestProds[] = $prod;
            }
        }
        return view("home", compact("bestProds"));
    }
}
