<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipesVsIngredientsStoreRequest;
use App\Http\Requests\RecipesVsIngredientsUpdateRequest;
use App\Models\RecipesVsIngredients;
use Illuminate\Http\Request;

class RecipesVsIngredientsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recipesVsIngredients = RecipesVsIngredient::all();

        return view('recipesVsIngredient.index', compact('recipesVsIngredients'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('recipesVsIngredient.create');
    }

    /**
     * @param \App\Http\Requests\RecipesVsIngredientsStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipesVsIngredientsStoreRequest $request)
    {
        $recipesVsIngredient = RecipesVsIngredient::create($request->validated());

        $request->session()->flash('recipesVsIngredient.id', $recipesVsIngredient->id);

        return redirect()->route('recipesVsIngredient.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RecipesVsIngredients $recipesVsIngredient
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RecipesVsIngredient $recipesVsIngredient)
    {
        return view('recipesVsIngredient.show', compact('recipesVsIngredient'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RecipesVsIngredients $recipesVsIngredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RecipesVsIngredient $recipesVsIngredient)
    {
        return view('recipesVsIngredient.edit', compact('recipesVsIngredient'));
    }

    /**
     * @param \App\Http\Requests\RecipesVsIngredientsUpdateRequest $request
     * @param \App\Models\RecipesVsIngredients $recipesVsIngredient
     * @return \Illuminate\Http\Response
     */
    public function update(RecipesVsIngredientsUpdateRequest $request, RecipesVsIngredient $recipesVsIngredient)
    {
        $recipesVsIngredient->update($request->validated());

        $request->session()->flash('recipesVsIngredient.id', $recipesVsIngredient->id);

        return redirect()->route('recipesVsIngredient.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RecipesVsIngredients $recipesVsIngredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RecipesVsIngredient $recipesVsIngredient)
    {
        $recipesVsIngredient->delete();

        return redirect()->route('recipesVsIngredient.index');
    }
}
