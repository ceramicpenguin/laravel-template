<?php

namespace App\Http\Controllers;

use App\Recipe;

class RecipeController extends Controller
{
    // Recipe index
    // Recipe create
    // Recipe edit
    // Recipe delete
    // Recipe print
    // Print all recipes

    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', ['recipes' => $recipes]);
    }

    public function show()
    {

    }

    public function create()
    {
        return view('recipes.create');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    public function store()
    {
        $recipe = new Recipe();
        $recipe->title = request('title');
        $recipe->description = request('description');
        $recipe->save();
        return redirect('recipes');
    }
}
