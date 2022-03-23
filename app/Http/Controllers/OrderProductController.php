<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderProductStoreRequest;
use App\Http\Requests\OrderProductUpdateRequest;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderProducts = OrderProduct::all();

        return view('orderProduct.index', compact('orderProducts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('orderProduct.create');
    }

    /**
     * @param \App\Http\Requests\OrderProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderProductStoreRequest $request)
    {
        $orderProduct = OrderProduct::create($request->validated());

        $request->session()->flash('orderProduct.id', $orderProduct->id);

        return redirect()->route('orderProduct.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderProduct $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OrderProduct $orderProduct)
    {
        return view('orderProduct.show', compact('orderProduct'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderProduct $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, OrderProduct $orderProduct)
    {
        return view('orderProduct.edit', compact('orderProduct'));
    }

    /**
     * @param \App\Http\Requests\OrderProductUpdateRequest $request
     * @param \App\Models\OrderProduct $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(OrderProductUpdateRequest $request, OrderProduct $orderProduct)
    {
        $orderProduct->update($request->validated());

        $request->session()->flash('orderProduct.id', $orderProduct->id);

        return redirect()->route('orderProduct.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderProduct $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, OrderProduct $orderProduct)
    {
        $orderProduct->delete();

        return redirect()->route('orderProduct.index');
    }
}
