<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventarioStoreRequest;
use App\Http\Requests\InventarioUpdateRequest;
use App\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{

    public function index(Request $request)
    {
        return view('inventario.index');
    }

    public function create(Request $request)
    {
        return view('inventario.create');
    }

    public function store(InventarioStoreRequest $request)
    {
        $inventario = Inventario::create($request->validated());

        $request->session()->flash('inventario.id', $inventario->id);

        return redirect()->route('inventario.index');
    }

    public function show(Request $request, Inventario $inventario)
    {
        return view('inventario.show', compact('inventario'));
    }

    public function edit(Request $request, Inventario $inventario)
    {
        return view('inventario.edit', compact('inventario'));
    }

    public function update(InventarioUpdateRequest $request, Inventario $inventario)
    {
        $inventario->update($request->validated());

        $request->session()->flash('inventario.id', $inventario->id);

        return redirect()->route('inventario.index');
    }

    public function destroy(Request $request, Inventario $inventario)
    {
        $inventario->delete();

        return redirect()->route('inventario.index');
    }

}
