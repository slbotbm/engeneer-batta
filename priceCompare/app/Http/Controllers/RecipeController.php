<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Supermarket;

use Illuminate\Http\Request;
use Validator;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $recipes = Recipe::paginate();
        return response()->view('recipe.index',compact('recipes'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $recipe= Recipe::find($id);
        $ingredients = $recipe->ingredients;
        $id = $recipe->id;
        return response()->view('recipe.show', compact('recipe','ingredients', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }

    public function priceList(Request $request, string $recipe_id) {
        $request->validate([
            'ingredients' => 'required'
        ]);

        $recipe = Recipe::find($recipe_id);

        $checkbox_array = [];
        foreach ($request->ingredients as $value){
            $checkbox_array[] = $value;
        }
        $ingredients_array = [];
        $supermarkets_array = [];
        
        
        for($i = 0; $i < count($checkbox_array); $i++) {
            $id_pos = strpos($checkbox_array[$i], 'id');
            $id = (int)trim(substr($checkbox_array[$i], $id_pos+4, 4), '",');
            $ingredient = Ingredient::find($id);
            array_push($ingredients_array, $ingredient->toArray());
            $supermarkets = $ingredient->supermarkets()->get();
            array_push($supermarkets_array, $supermarkets->toArray());
            
        }
        return response()->view('recipe.priceList', compact('ingredients_array', 'supermarkets_array', 'recipe_id', 'recipe'));

    }

    public function cheapest(Request $request, string $recipe_id) {
        $recipe = Recipe::find($recipe_id);
        $final_array = [];
        $sum = 0;
        foreach ($request->ingredients as $value){

            $ingredient = Ingredient::find((int)$value);
            $supermarkets = $ingredient->supermarkets()->get();
            $prices = [];

            foreach($supermarkets as $supermarket) {
                $prices[$supermarket["name"]] = $supermarket["pivot"]["ingredient_supermarket_price"];
            }
            asort($prices);
            $sum +=  $prices[array_keys($prices)[0]];

            if (array_key_exists(array_keys($prices)[0], $final_array)) {
                array_push($final_array[array_keys($prices)[0]], ["ingredient"=>$ingredient->toArray(), "price" => $prices[array_keys($prices)[0]]]);
            } else {
                $final_array[array_keys($prices)[0]] = [["ingredient"=>$ingredient->toArray(), "price" => $prices[array_keys($prices)[0]]]];
            }
        }
        $supermarkets_array = array_keys($final_array);
        return response()->view('recipe.cheapest', compact('final_array', 'supermarkets_array', 'sum', 'recipe'));
    }
}