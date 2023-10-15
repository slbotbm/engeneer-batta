<?php

namespace App\Http\Controllers;

use App\Models\Supermarket;
use Illuminate\Http\Request;

class SupermarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supermarkets = Supermarket::orderBy('name', 'asc')->paginate(10);
        return response()->view('supermarket.index', compact('supermarkets'));
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
        $supermarket = Supermarket::find($id);
        $ingredients = $supermarket->ingredients;
        ddd($ingredients    );
        return response()->view('supermarket.show', compact('supermarket', 'ingredients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supermarket $supermarket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supermarket $supermarket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supermarket $supermarket)
    {
        //
    }
}
