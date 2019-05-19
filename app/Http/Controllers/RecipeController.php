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
}
