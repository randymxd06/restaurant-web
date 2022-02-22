<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product_CategoryStoreRequest;
use App\Http\Requests\Product_CategoryUpdateRequest;
//use App\ProductCategory;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class Product_CategoryController extends Controller
{

    public function index(Request $request)
    {
        $productCategories = ProductCategory::all();
        dd($productCategories);
        return view('productCategory.index', compact('productCategories'));
    }

    public function create(Request $request)
    {
        return view('productCategory.create');
    }

    public function store(Product_CategoryStoreRequest $request)
    {
        $productCategory = ProductCategory::create($request->validated());
        $request->session()->flash('productCategory.id', $productCategory->id);
        return redirect()->route('productCategory.index');
    }

    public function show(Request $request, Product_Category $productCategory)
    {
        return view('productCategory.show', compact('productCategory'));
    }

    public function edit(Request $request, Product_Category $productCategory)
    {
        return view('productCategory.edit', compact('productCategory'));
    }

    public function update(Product_CategoryUpdateRequest $request, Product_Category $productCategory)
    {
        $productCategory->update($request->validated());
        $request->session()->flash('productCategory.id', $productCategory->id);
        return redirect()->route('productCategory.index');
    }

    public function destroy(Request $request, Product_Category $productCategory)
    {
        $productCategory->delete();
        return redirect()->route('productCategory.index');
    }

}
