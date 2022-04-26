<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientsStockStoreRequest;
use App\Http\Requests\IngredientsStockUpdateRequest;
use App\Models\IngredientsStock;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\UnitsMeasurement;
use \RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class IngredientsStockController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ingredientsStocks = IngredientsStock::all();
        return view('ingredientsStock.index', compact('ingredientsStocks'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $ingredients = Ingredient::all()->where('status', '=', 1);
        $ingredients = DB::table('ingredients')
            ->select('ingredients.*')
            ->whereNotExists(function($query)
            {
                $query->select(DB::raw(1))
                    ->from('ingredients_stocks')
                    ->whereRaw('ingredients.id = ingredients_stocks.ingredient_id');
            })
            ->get();
        $units_measurement = UnitsMeasurement::all();

        return view('ingredientsStock.create', compact('ingredients', 'units_measurement'));
    }

    /**
     * @param \App\Http\Requests\IngredientsStockStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientsStockStoreRequest $request)
    {
        $ingredientsStock = IngredientsStock::create($request->validated());

        $request->session()->flash('ingredientsStock.id', $ingredientsStock->id);
        Alert::success('Stock de ingrediente registrado correctamente');
        return redirect('ingredients');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\IngredientsStock $ingredientsStock
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, IngredientsStock $ingredientsStock)
    {
        return view('ingredientsStock.show', compact('ingredientsStock'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\IngredientsStock $ingredientsStock
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, IngredientsStock $ingredientsStock)
    {
        return view('ingredientsStock.edit', compact('ingredientsStock'));
    }

    /**
     * @param \App\Http\Requests\IngredientsStockUpdateRequest $request
     * @param \App\Models\IngredientsStock $ingredientsStock
     * @return \Illuminate\Http\Response
     */
    public function update(IngredientsStockUpdateRequest $request, IngredientsStock $ingredientsStock)
    {
        $ingredientsStock->update($request->validated());

        $request->session()->flash('ingredientsStock.id', $ingredientsStock->id);

        return redirect()->route('ingredientsStock.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\IngredientsStock $ingredientsStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, IngredientsStock $ingredientsStock)
    {
        $ingredientsStock->delete();

        return redirect()->route('ingredientsStock.index');
    }
}
