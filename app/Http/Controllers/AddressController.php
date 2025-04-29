<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $page = $request->page;
        $data = $request->all();
        $newAddress = new Address();

        $newAddress->nome = $data["nome"];
        $newAddress->cognome = $data["cognome"];
        $newAddress->indirizzo = $data["indirizzo"];
        $newAddress->civico = $data["civico"];
        $newAddress->localita = $data["localita"];
        $newAddress->provincia = $data["provincia"];
        $newAddress->cap = $data["cap"];
        $newAddress->user_id = Auth::user()->id;

        $newAddress->save();

        if ($page == "checkout"){
            return redirect(route("order.checkout"));
        } else {
            return redirect(route("user.details"));
        }
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
    public function edit(string $id)
    {
        //
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
