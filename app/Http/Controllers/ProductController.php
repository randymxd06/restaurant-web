<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->validated());
        $request->session()->flash('product.id', $product->id);
        return redirect()->route('product.index');
    }

    public function show(Request $request, Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Request $request, Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->validated());
        $request->session()->flash('product.id', $product->id);
        return redirect()->route('product.index');
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

}
