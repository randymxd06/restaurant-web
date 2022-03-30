<?php

namespace App\Http\Controllers;

use App\Cocina;
use App\Http\Requests\CocinaStoreRequest;
use App\Http\Requests\CocinaUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class CocinaController extends Controller
{

    public function index(Request $request)
    {
        $orders = Order::all()->where('status', '<>', 0);
        $order_products = OrderProduct::all();
        $products = Product::all();
        return view('cocina.index', compact('orders', 'order_products', 'products'));
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
