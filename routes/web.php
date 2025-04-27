<?php

use App\Http\Controllers\MainControler;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainControler::class, "home"])->name("home");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::name("products.")
->prefix("products")
->group(function() {
    Route::get("/", [ProductController::class, "index"])->name("index");
    Route::get("/filtered/{cat}", [ProductController::class, "filtered"])->name("filtered");
    Route::get("/products/{prod}", [ProductController::class, "details"])->name("details");
});

Route::middleware(["auth", "verified"])
->name("user.")
->prefix("user")
->group(function() {
    Route::get("/details", [UserController::class, "details"])->name("details");
    Route::get("/orders", [UserController::class, "orders"])->name("orders");
    Route::get("/cart", [UserController::class, "cart"])->name("cart");
    Route::get("/cart/add/{prod}", [UserController::class, "addToCart"])->name("addToCart");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
