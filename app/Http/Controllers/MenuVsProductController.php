<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuVsProductStoreRequest;
use App\Http\Requests\MenuVsProductUpdateRequest;
use App\Models\MenuVsProduct;
use Illuminate\Http\Request;

class MenuVsProductController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menuVsProducts = MenuVsProduct::all();

        return view('menuVsProduct.index', compact('menuVsProducts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('menuVsProduct.create');
    }

    /**
     * @param \App\Http\Requests\MenuVsProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuVsProductStoreRequest $request)
    {
        $menuVsProduct = MenuVsProduct::create($request->validated());

        $request->session()->flash('menuVsProduct.id', $menuVsProduct->id);

        return redirect()->route('menuVsProduct.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MenuVsProduct $menuVsProduct
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MenuVsProduct $menuVsProduct)
    {
        return view('menuVsProduct.show', compact('menuVsProduct'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MenuVsProduct $menuVsProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MenuVsProduct $menuVsProduct)
    {
        return view('menuVsProduct.edit', compact('menuVsProduct'));
    }

    /**
     * @param \App\Http\Requests\MenuVsProductUpdateRequest $request
     * @param \App\Models\MenuVsProduct $menuVsProduct
     * @return \Illuminate\Http\Response
     */
    public function update(MenuVsProductUpdateRequest $request, MenuVsProduct $menuVsProduct)
    {
        $menuVsProduct->update($request->validated());

        $request->session()->flash('menuVsProduct.id', $menuVsProduct->id);

        return redirect()->route('menuVsProduct.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MenuVsProduct $menuVsProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MenuVsProduct $menuVsProduct)
    {
        $menuVsProduct->delete();

        return redirect()->route('menuVsProduct.index');
    }
}
