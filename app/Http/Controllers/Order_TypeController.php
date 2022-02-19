<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order_TypeStoreRequest;
use App\Http\Requests\Order_TypeUpdateRequest;
use App\OrderType;
use Illuminate\Http\Request;

class Order_TypeController extends Controller
{

    public function index(Request $request)
    {
        $orderTypes = OrderType::all();
        return view('orderType.index', compact('orderTypes'));
    }

    public function create(Request $request)
    {
        return view('orderType.create');
    }

    public function store(Order_TypeStoreRequest $request)
    {
        $orderType = OrderType::create($request->validated());
        $request->session()->flash('orderType.id', $orderType->id);
        return redirect()->route('orderType.index');
    }

    public function show(Request $request, Order_Type $orderType)
    {
        return view('orderType.show', compact('orderType'));
    }

    public function edit(Request $request, Order_Type $orderType)
    {
        return view('orderType.edit', compact('orderType'));
    }

    public function update(Order_TypeUpdateRequest $request, Order_Type $orderType)
    {
        $orderType->update($request->validated());
        $request->session()->flash('orderType.id', $orderType->id);
        return redirect()->route('orderType.index');
    }

    public function destroy(Request $request, Order_Type $orderType)
    {
        $orderType->delete();
        return redirect()->route('orderType.index');
    }

}
