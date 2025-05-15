<?php

use App\Categorie;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "prods"], function(){
    Route::get("/", [ApiController::class, "index"]);
    Route::get("/best", [ApiController::class, "best"]);
    Route::get("/cat/{category}", [ApiController::class, "filterCat"]);
});

Route::get("/cats", function(){
    $cats = Categorie::cases();

    return response()->json([
        "success" => true,
        "data" => $cats
    ]);
});