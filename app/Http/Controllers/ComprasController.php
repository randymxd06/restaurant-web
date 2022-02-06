<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Http\Requests\ComprasStoreRequest;
use App\Http\Requests\ComprasUpdateRequest;
use Illuminate\Http\Request;

class ComprasController extends Controller
{

    public function index(Request $request)
    {
        return view('compra.index');
    }

    public function create(Request $request)
    {
        return view('compra.create');
    }

    public function store(ComprasStoreRequest $request)
    {
        $compra = Compra::create($request->validated());

        $request->session()->flash('compra.id', $compra->id);

        return redirect()->route('compra.index');
    }

    public function show(Request $request, Compra $compra)
    {
        return view('compra.show', compact('compra'));
    }

    public function edit(Request $request, Compra $compra)
    {
        return view('compra.edit', compact('compra'));
    }

    public function update(ComprasUpdateRequest $request, Compra $compra)
    {
        $compra->update($request->validated());

        $request->session()->flash('compra.id', $compra->id);

        return redirect()->route('compra.index');
    }

    public function destroy(Request $request, Compra $compra)
    {
        $compra->delete();

        return redirect()->route('compra.index');
    }

}
