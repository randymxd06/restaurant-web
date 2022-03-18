<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use function MongoDB\BSON\toJSON;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all()->where('status', '=',true);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {

        try {

            // OBTENGO LA DATA POR REQUEST, QUITANDO EL TOKEN //
            $productsData = $request->except('_token');

            // HAGO LA VALIDACION DEL STATUS, PARA ENVIARLA COMO TRUE O FALSE //
            ($productsData['status'] == 'on') ? $productsData['status'] = true : $productsData['status'] = false;

            // SI HAY UN ARCHIVO ENTONCES //
            if ($request->hasFile('img')){

                // GUARDO LA IMAGEN EN EL STORAGE Y LE ASIGNO LA RUTA A LA VARIABLE PRODUCTSDATA['IMG']
                $productsData['img'] = $request->file('img')->store('uploads', 'public');

            }

            // ESTE ES EL OBJETO CON LA INFORMACION QUE SE VA A GUARDAR //
            $json = [
                'name' => $productsData['name'],
                'image' => $productsData['img'],
                'price' => (double) $productsData['price'],
                'products_categories_id' => (int) $productsData['products_categories_id'],
                'description' => ucfirst(strtolower($productsData['description'])),
                'status' => $productsData['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            // CREO LA MESA //
            Product::insert($json);

            // REDIRECCIONO A LA RUTA PRINCIPAL //
            return redirect('products');

        }catch (Exception $e){

            throw new Exception($e);

        }

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
