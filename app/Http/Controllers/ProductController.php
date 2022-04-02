<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use function MongoDB\BSON\toJSON;
use Illuminate\Support\Facades\Storage;

use Alert;

class ProductController extends Controller
{
    

    // Mensaje de error al mostrar
    public function messageProduct(){
        return [
            'name.required' => 'El nombre del producto es requerido.',
            'name.string' => 'El nombre del producto debe ser un texto.',
            'name.unique' => 'Este nombre del producto ya existe.',
            // 
            'products_categories_id.required' => 'Seleccione una categoria para el producto.',
            'products_categories_id.numeric' => 'Error en la categoria del producto.',                
            // 
            'price.required' => 'El precio es requerido.',
            'price.numeric' => 'El precio debe ser un número.',
            // 
            'description.string' => 'La descripción debe ser un texto.',
            'description.required' => 'La descripción es requerido.'
        ];
    }
    
    public function index()
    {
        
        $products = Product::all();
        $ProductCategories = ProductCategory::all()->where('status', '=', 1);
        return view('product.index', compact('products'))->with('ProductCategories', $ProductCategories);
    }

    public function create()
    {
        $ProductCategories = ProductCategory::all()->where('status', '=', 1);
        return view('product.create')->with('ProductCategories', $ProductCategories);
    }

    public function store(Request $request)
    {
        try{
            // Validacion del formulario 
            $validate = [
                'name' =>[
                    'required',
                    'string',
                    'unique:products,name'
                ],
                'description' => [
                    // 'required',
                    // 'string'
                ],
                'products_categories_id' => [
                    'required',
                    'numeric'
                ],
                'price' => [
                    'required',
                    'numeric'
                ]
            ];
            
            // Realizar validacion de los datos
            $this -> validate($request, $validate, $this->messageProduct());

            // Validar el estado, para enviar como true o false
            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            (empty($request['description'])) ? $request['description'] = $request['name'] : null;

            // Objeto con la informacion que es guardara, exceptuando el TOKEN
            $data = request()->except('_token');
            $data['name'] = ucfirst(strtolower($data['name']));
            $data['price'] = (double) $data['price'];
            $data['products_categories_id'] = (int) $data['products_categories_id'];
            $data['description'] = ucfirst(strtolower($data['description']));
            $data['created_at'] = Carbon::now();
            
            if($request->hasFile('image')){
                $data['image'] = $request->file('image')->store('uploads', 'public');
            }

            // return response()->json($data);

            // Agregar producto 
            Product::insert($data);
            Alert::toast('Producto agregador correctamente', 'success');
            return redirect('products');
        }catch(Exception $ex){
            throw new Exception($ex);
        }        
    }

    public function show(Request $request, Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $ProductCategories = ProductCategory::all();
        return view('product.edit', compact('product'))->with('ProductCategories', $ProductCategories);
    }

    public function update(Request $request, $id)
    {
        try{
            $validate = [
                'name' =>[
                    'required',
                    'string',
                    'unique:products,name,'.$id
                ],
                'description' => [
                    // 'required',
                    // 'string'
                ],
                'products_categories_id' => [
                    'required',
                    'numeric'
                ],
                'price' => [
                    'required',
                    'numeric'
                ]
            ];

            // Realizar validacion de los datos
            $this -> validate($request, $validate, $this->messageProduct());

            // Validar el estado, para enviar como true o false
            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            (empty($request['description'])) ? $request['description'] = $request['name'] : null;

            // Objeto con la informacion que es guardara, exceptuando el TOKEN
            $data = request()->except('_token', '_method');
            $data['name'] = ucfirst(strtolower($data['name']));
            $data['price'] = (double) $data['price'];
            $data['products_categories_id'] = (int) $data['products_categories_id'];
            $data['description'] = ucfirst(strtolower($data['description']));
            $data['updated_at'] = Carbon::now();

            if($request->hasFile('image')){
                $product = Product::findOrFail($id);
                Storage::delete('public/'.$product->image);
                $data['image'] = $request->file('image')->store('uploads', 'public');
            }

            // Comprobar datos recibidos 
            // return response()->json($data);

            // Actualizar datos cuando el id coincida
            Product::where('id','=',$id)->update($data);
            Alert::toast('Producto editado correctamente', 'success');

            return redirect('products');

        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }

    public function destroy($id)
    {
        try{
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect('products');
        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }

}
