<?php

namespace App\Http\Controllers;

use App\Http\Requests\MesasStoreRequest;
use App\Http\Requests\MesasUpdateRequest;
use App\Mesa;
use Illuminate\Http\Request;

class MesasController extends Controller
{

    public function index(Request $request)
    {
        return view('mesa.index');
    }

    public function create(Request $request)
    {
        return view('mesa.create');
    }

    public function store(Request $request)
    {

        dd($request->all());

        $mesa = Mesa::create($request->validated());

        $request->session()->flash('mesa.id', $mesa->id);

        return redirect()->route('mesa.index');
    }

    public function show(Request $request, Mesa $mesa)
    {
        return view('mesa.show', compact('mesa'));
    }

    public function edit(Request $request, Mesa $mesa)
    {
        return view('mesa.edit', compact('mesa'));
    }

    public function update(MesasUpdateRequest $request, Mesa $mesa)
    {
        $mesa->update($request->validated());

        $request->session()->flash('mesa.id', $mesa->id);

        return redirect()->route('mesa.index');
    }

    public function destroy(Request $request, Mesa $mesa)
    {
        $mesa->delete();

        return redirect()->route('mesa.index');
    }

}
