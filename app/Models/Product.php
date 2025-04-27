<?php

namespace App\Models;

use App\Categorie;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'categorie' => Categorie::class,
        "taglie" => "array",
    ];  
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
