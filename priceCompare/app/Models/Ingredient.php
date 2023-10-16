<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    public function recipes() {
        return $this->belongsToMany(Recipe::class)->withTimestamps();
    }

    public function supermarkets() {
        return $this->belongsToMany(Supermarket::class)->withPivot('ingredient_supermarket_price');
    }
}
