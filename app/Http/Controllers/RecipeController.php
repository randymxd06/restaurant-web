<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeStoreRequest;
use App\Http\Requests\RecipeUpdateRequest;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recipes = Recipe::all();

        return view('recipe.index', compact('recipes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('recipe.create');
    }

    /**
     * @param \App\Http\Requests\RecipeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeStoreRequest $request)
    {
        $recipe = Recipe::create($request->validated());

        $request->session()->flash('recipe.id', $recipe->id);

        return redirect()->route('recipe.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Recipe $recipe)
    {
        return view('recipe.show', compact('recipe'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Recipe $recipe)
    {
        return view('recipe.edit', compact('recipe'));
    }

    /**
     * @param \App\Http\Requests\RecipeUpdateRequest $request
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeUpdateRequest $request, Recipe $recipe)
    {
        $recipe->update($request->validated());

        $request->session()->flash('recipe.id', $recipe->id);

        return redirect()->route('recipe.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipe.index');
    }
}
