<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecepcionStoreRequest;
use App\Http\Requests\RecepcionUpdateRequest;
use App\Recepcion;
use Illuminate\Http\Request;

class RecepcionController extends Controller
{

    public function index(Request $request)
    {
        return view('recepcion.index');
    }

    public function create(Request $request)
    {
        return view('recepcion.create');
    }

    public function store(RecepcionStoreRequest $request)
    {
        $recepcion = Recepcion::create($request->validated());

        $request->session()->flash('recepcion.id', $recepcion->id);

        return redirect()->route('recepcion.index');
    }

    public function show(Request $request, Recepcion $recepcion)
    {
        return view('recepcion.show', compact('recepcion'));
    }

    public function edit(Request $request, Recepcion $recepcion)
    {
        return view('recepcion.edit', compact('recepcion'));
    }

    public function update(RecepcionUpdateRequest $request, Recepcion $recepcion)
    {
        $recepcion->update($request->validated());

        $request->session()->flash('recepcion.id', $recepcion->id);

        return redirect()->route('recepcion.index');
    }

    public function destroy(Request $request, Recepcion $recepcion)
    {
        $recepcion->delete();

        return redirect()->route('recepcion.index');
    }

}
