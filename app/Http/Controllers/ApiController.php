<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $prods = Product::all();

        if (!$prods) {
            return response()->json([
                "success" => false,
                "message" => "Prodotti non trovati."
            ], 404);
        }

        return response()->json([
            "success" => true,
            "data" => $prods,
        ]);
    }

    public function best()
    {
        $bestProds = Product::with('reviews')
            ->get()
            ->map(function ($product) {

                $averageRating = $product->reviews->avg('voto');
                $product->average_rating = $averageRating;
                if ($averageRating > 4) {
                    $product->hot = true;
                }
                return $product;
            })
            ->sortByDesc('average_rating')
            ->take(9);

        if (!$bestProds) {
            return response()->json([
                "success" => false,
                "message" => "Prodotti non trovati."
            ], 404);
        }

        return response()->json([
            "success" => true,
            "data" => array_values($bestProds->toArray()),
        ]);
    }

    public function filterCat(string $cat)
    {
        $prods = Product::where("categoria", $cat)
            ->with('reviews')
            ->get()
            ->map(function ($product) {

                $averageRating = $product->reviews->avg('voto');
                $product->average_rating = $averageRating;
                if ($averageRating > 4) {
                    $product->hot = true;
                }
                return $product;
            })
            ->sortByDesc('average_rating');

        if (!$prods) {
            return response()->json([
                "success" => false,
                "message" => "Prodotti non trovati."
            ], 404);
        }

        return response()->json([
            "success" => true,
            "data" => $prods,
        ]);
    }

    public function search(string $search)
    {
        $prods = Product::where("nome", "LIKE", "%$search%")
            ->with('reviews')
            ->get()
            ->map(function ($product) {

                $averageRating = $product->reviews->avg('voto');
                $product->average_rating = $averageRating;
                if ($averageRating > 4) {
                    $product->hot = true;
                }
                return $product;
            })
            ->sortByDesc('average_rating');

        if ($prods->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Nessun risultato"
            ]);
        }

        return response()->json([
            "success" => true,
            "data" => $prods
        ]);
    }

    public function show($id)
    {
        $prod = Product::with("reviews")->find($id);

        if (!$prod) {
            return response()->json([
                "success" => false,
                "message" => "Prodotto non trovato."
            ], 404);
        }

        $averageRating = $prod->reviews->avg('voto');
        $prod->average_rating = $averageRating;
        if ($averageRating > 4) {
            $prod->hot = true;
        }

        return response()->json([
            "success" => true,
            "data" => $prod,
        ]);
    }


    public function advancedSearch(Request $request)
    {
        $data = $request->all();

        ["nome" => $nome, "categoria" => $categoria, "prezzoMin" => $prezzoMin, "prezzoMax" => $prezzoMax, "isTagliaFiltered" => $isTagliaFiltered, "taglie" => $taglie] = $data;


        $prods = $isTagliaFiltered ?

            Product::where("nome", "LIKE", "%$nome%")
                ->whereIn("categoria", $categoria)
                ->where("prezzo", ">=", $prezzoMin)
                ->where("prezzo", "<=", $prezzoMax)
                ->whereJsonContains("taglie", $taglie)
                ->with('reviews')
                ->get()
                ->map(function ($product) {

                    $averageRating = $product->reviews->avg('voto');
                    $product->average_rating = $averageRating;
                    if ($averageRating > 4) {
                        $product->hot = true;
                    }
                    return $product;
                })

            :

            Product::where("nome", "LIKE", "%$nome%")
                ->whereIn("categoria", $categoria)
                ->where("prezzo", ">=", $prezzoMin)
                ->where("prezzo", "<=", $prezzoMax)
                ->with('reviews')
                ->get()
                ->map(function ($product) {

                    $averageRating = $product->reviews->avg('voto');
                    $product->average_rating = $averageRating;
                    if ($averageRating > 4) {
                        $product->hot = true;
                    }
                    return $product;
                });

        if ($prods->isEmpty()) {

            return response()->json([
                "success" => false,
                "message" => "Nessun prodotto trovato",
            ]);

        }


        return response()->json([
            "success" => true,
            "data" => $prods,
        ]);



    }
}
