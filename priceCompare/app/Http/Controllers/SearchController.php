<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Supermarket;
use Validator;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keyword' => 'required|min:1',
        ]);
        if ($validator->fails()) {
            return redirect()
            ->route('search.input')
            ->withInput()
            ->withErrors($validator);
        }
        $keyword = trim($request->keyword);
        $recipes = Recipe::query()
            ->where('name', 'like', "%{$keyword}%")
            ->get();
        $ingredients = Ingredient::query()
           ->where('name', 'like', "%{$keyword}%")
            ->get();
            //ddd($ingredients);
        $supermarkets = Supermarket::query()
           ->where('name', 'like', "%{$keyword}%")
            ->get();
            //ddd($supermarkets);
          return response()->view('search.index', compact('recipes','ingredients','supermarkets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('search.input');
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
