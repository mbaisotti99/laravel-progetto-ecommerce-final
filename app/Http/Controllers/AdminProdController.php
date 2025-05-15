<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prods = Product::orderByDesc("created_at")->paginate(10);

        return view("admin.prods", compact("prods"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Categorie::cases();

        return view("products.create", compact("cats"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newProd = new Product();

        if(array_key_exists("img",$data)){
            $img_path = Storage::putFile("prods", $data["img"]);
            $img_name = basename($img_path);
            $newProd->img = $img_name;
        } else{
            $newProd->img = null;
        }

        $newProd->nome = $data["nome"];
        $newProd->descrizione = $data["descrizione"];
        $newProd->categoria = $data["categoria"];
        $newProd->prezzo = $data["prezzo"];
        $newProd->taglie = $data["taglie"];

        $newProd->save();

        return redirect(route("prods-admin.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cats = Categorie::cases();
        $prod = Product::find($id);
        return view("products.edit", compact("prod", "cats"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product)
    {
        $prod = Product::find($product);
        $data = $request->all();

        if(array_key_exists("img", $data)){
            Storage::delete($prod->img);
            $img_path = Storage::putFile("prods", $data["img"]);
            $filename = basename($img_path);
            $prod->img = $filename;
        }
        $prod->nome = $data["nome"];
        $prod->descrizione = $data["descrizione"];
        $prod->categoria = $data["categoria"];
        $prod->prezzo = $data["prezzo"];
        $prod->taglie = $data["taglie"];



        $prod->update();
        
        return redirect(route("prods-admin.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($prod)
    {
        $prod = Product::find($prod);
        $prod->delete();

        return redirect(route("prods-admin.index"));
    }
}
