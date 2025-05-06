<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prods = Product::paginate(10);

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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
