<?php

namespace App\Http\Controllers;

use App\Caja;
use App\Http\Requests\CajaStoreRequest;
use App\Http\Requests\CajaUpdateRequest;
use Illuminate\Http\Request;

class CajaController extends Controller
{

    public function index(Request $request)
    {
        return view('caja.index');
    }

    public function create(Request $request)
    {
        return view('caja.create');
    }

    public function store(CajaStoreRequest $request)
    {
        $caja = Caja::create($request->validated());

        $request->session()->flash('caja.id', $caja->id);

        return redirect()->route('caja.index');
    }

    public function show(Request $request, Caja $caja)
    {
        return view('caja.show', compact('caja'));
    }

    public function edit(Request $request, Caja $caja)
    {
        return view('caja.edit', compact('caja'));
    }

    public function update(CajaUpdateRequest $request, Caja $caja)
    {
        $caja->update($request->validated());

        $request->session()->flash('caja.id', $caja->id);

        return redirect()->route('caja.index');
    }

    public function destroy(Request $request, Caja $caja)
    {
        $caja->delete();

        return redirect()->route('caja.index');
    }

}
