<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    public function create(Request $request)
    {
        return view('order.create');
    }

    public function store(OrderStoreRequest $request)
    {
        $order = Order::create($request->validated());
        $request->session()->flash('order.id', $order->id);
        return redirect()->route('order.index');
    }

    public function show(Request $request, Order $order)
    {
        return view('order.show', compact('order'));
    }

    public function edit(Request $request, Order $order)
    {
        return view('order.edit', compact('order'));
    }

    public function update(OrderUpdateRequest $request, Order $order)
    {
        $order->update($request->validated());
        $request->session()->flash('order.id', $order->id);
        return redirect()->route('order.index');
    }

    public function destroy(Request $request, Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }

}
