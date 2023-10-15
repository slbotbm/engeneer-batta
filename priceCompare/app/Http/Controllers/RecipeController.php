<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
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
        $arr = [];
        $sum = 0;
        for($i = 0; $i < count($checkbox_array); $i++) {
            $id_pos = strpos($checkbox_array[$i], 'id');
            $id = (int)trim(substr($checkbox_array[$i], $id_pos+4, 4), '",');
            $name_pos = strpos($checkbox_array[$i], 'name');
            $name = trim(substr($checkbox_array[$i], $name_pos+7, strpos($checkbox_array[$i], '","price"')-$name_pos-7), '",');
            $price_pos = strpos($checkbox_array[$i], 'price');
            $price = (int)trim(substr($checkbox_array[$i], $price_pos+7, 4), '",');
            $sum += $price;
            array_push($arr, ["id" => $id, "name" => $name, "price"=> $price]);
        }
        return response()->view('recipe.calculate', compact('arr','sum'));
        


    }

}
