<?php

namespace App\Http\Controllers;

use App\Cocina;
use App\Http\Requests\CocinaStoreRequest;
use App\Http\Requests\CocinaUpdateRequest;
use Illuminate\Http\Request;

class CocinaController extends Controller
{

    public function index(Request $request)
    {
        return view('cocina.index');
    }

    public function create(Request $request)
    {
        return view('cocina.create');
    }

    public function store(CocinaStoreRequest $request)
    {
        $cocina = Cocina::create($request->validated());

        $request->session()->flash('cocina.id', $cocina->id);

        return redirect()->route('cocina.index');
    }

    public function show(Request $request, Cocina $cocina)
    {
        return view('cocina.show', compact('cocina'));
    }

    public function edit(Request $request, Cocina $cocina)
    {
        return view('cocina.edit', compact('cocina'));
    }

    public function update(CocinaUpdateRequest $request, Cocina $cocina)
    {
        $cocina->update($request->validated());

        $request->session()->flash('cocina.id', $cocina->id);

        return redirect()->route('cocina.index');
    }

    public function destroy(Request $request, Cocina $cocina)
    {
        $cocina->delete();

        return redirect()->route('cocina.index');
    }

}
