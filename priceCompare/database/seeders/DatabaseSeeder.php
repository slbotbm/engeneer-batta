<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();


        
         \App\Models\Recipe::factory(50)->create();

         \App\Models\Ingredient::factory(250)->create();

         $ingredients = \App\Models\Ingredient::all();

         \App\Models\Recipe::all()->each(function ($recipe) use ($ingredients) {
            
            $recipe->ingredients()->attach(
                $ingredients->random(rand(5, 30))->pluck('id')->toArray()
            );
         });
    }
}