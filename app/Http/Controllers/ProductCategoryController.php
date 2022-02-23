<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productCategories = ProductCategory::all();

        return view('productCategory.index', compact('productCategories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('productCategory.create');
    }

    /**
     * @param \App\Http\Requests\ProductCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryStoreRequest $request)
    {
        $productCategory = ProductCategory::create($request->validated());

        $request->session()->flash('productCategory.id', $productCategory->id);

        return redirect()->route('productCategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProductCategory $productCategory)
    {
        return view('productCategory.show', compact('productCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProductCategory $productCategory)
    {
        return view('productCategory.edit', compact('productCategory'));
    }

    /**
     * @param \App\Http\Requests\ProductCategoryUpdateRequest $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryUpdateRequest $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->validated());

        $request->session()->flash('productCategory.id', $productCategory->id);

        return redirect()->route('productCategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ProductCategory $productCategory)
    {
        $productCategory->delete();

        return redirect()->route('productCategory.index');
    }
}
