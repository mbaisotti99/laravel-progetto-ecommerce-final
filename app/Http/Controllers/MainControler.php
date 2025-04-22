<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainControler extends Controller
{
    public function home()
    {
        $prods = Product::all();

        $bestProds = Product::with('reviews') // Carica le recensioni
            ->get() // Recupera i prodotti
            ->map(function ($product) {
                // Calcola la media delle recensioni per ogni prodotto
                $averageRating = $product->reviews->avg('voto'); // Calcola la media del campo `rating`
                $product->average_rating = $averageRating; // Aggiungi la media come attributo personalizzato
                if ($averageRating > 4){
                    $product->hot = true;
                }
                return $product;
            })
            ->sortByDesc('average_rating') // Ordina per la media delle recensioni in ordine decrescente
            ->take(9);


        return view("home", compact("bestProds"));
    }
}
