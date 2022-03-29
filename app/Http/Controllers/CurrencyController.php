<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyStoreRequest;
use App\Http\Requests\CurrencyUpdateRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $currencies = Currency::all();

        return view('currency.index', compact('currencies'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('currency.create');
    }

    /**
     * @param \App\Http\Requests\CurrencyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyStoreRequest $request)
    {
        $currency = Currency::create($request->validated());

        $request->session()->flash('currency.id', $currency->id);

        return redirect()->route('currency.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Currency $currency)
    {
        return view('currency.show', compact('currency'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Currency $currency)
    {
        return view('currency.edit', compact('currency'));
    }

    /**
     * @param \App\Http\Requests\CurrencyUpdateRequest $request
     * @param \App\Models\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyUpdateRequest $request, Currency $currency)
    {
        $currency->update($request->validated());

        $request->session()->flash('currency.id', $currency->id);

        return redirect()->route('currency.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Currency $currency)
    {
        $currency->delete();

        return redirect()->route('currency.index');
    }
}
