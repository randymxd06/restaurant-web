<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidosRapidosStoreRequest;
use App\Http\Requests\PedidosRapidosUpdateRequest;
use App\PedidosRapido;
use Illuminate\Http\Request;
use App\Models\Product;

class PedidosRapidosController extends Controller
{

    public function index(Request $request)
    {
        return view('pedidosRapido.index');
    }

    public function create(Request $request)
    {
        $products = Product::all()->where('status', '=', 1);
        return view('pedidosRapido.create', compact('products'));
    }

    public function store(PedidosRapidosStoreRequest $request)
    {
        $pedidosRapido = PedidosRapido::create($request->validated());

        $request->session()->flash('pedidosRapido.id', $pedidosRapido->id);

        return redirect()->route('pedidosRapido.index');
    }

    public function show(Request $request, PedidosRapido $pedidosRapido)
    {
        return view('pedidosRapido.show', compact('pedidosRapido'));
    }

    public function edit(Request $request, PedidosRapido $pedidosRapido)
    {
        return view('pedidosRapido.edit', compact('pedidosRapido'));
    }

    public function update(PedidosRapidosUpdateRequest $request, PedidosRapido $pedidosRapido)
    {
        $pedidosRapido->update($request->validated());

        $request->session()->flash('pedidosRapido.id', $pedidosRapido->id);

        return redirect()->route('pedidosRapido.index');
    }

    public function destroy(Request $request, PedidosRapido $pedidosRapido)
    {
        $pedidosRapido->delete();

        return redirect()->route('pedidosRapido.index');
    }

}
