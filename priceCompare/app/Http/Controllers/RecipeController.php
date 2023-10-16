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
        $recipes = Recipe::all();
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
        return response()->view('recipe.show', compact('recipe','ingredients'));
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

    public function calcPrice(Request $request) {
        $request->validate([
            'ingredients' => 'required'
        ]);

        $checkbox_array = [];
        foreach ($request->ingredients as $value){
            $checkbox_array[] = $value;
        }
        $ingredients_array = [];
        $supermarkets_array = [];
        $prices_array = [];
        
        for($i = 0; $i < count($checkbox_array); $i++) {
            $id_pos = strpos($checkbox_array[$i], 'id');
            $id = (int)trim(substr($checkbox_array[$i], $id_pos+4, 4), '",');
            $ingredient = Ingredient::find($id);
            array_push($ingredients_array, $ingredient->toArray());
            $supermarkets = $ingredient->supermarkets()->get();
            array_push($supermarkets_array, $supermarkets->toArray());
            
        }
        return response()->view('recipe.calculate', compact('ingredients_array', 'supermarkets_array'));

    }

}
