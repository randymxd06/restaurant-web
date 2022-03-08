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
    public function store(Request $request)
    {
        try{
            // Validacion del formulario 
            $validate = [
                'name' =>[
                    'required',
                    'string',
                    'unique:product_categories,name'
                ],
                'description' => [
                    'required',
                    'string'
                ]
            ];
            
            // Mensaje de error al mostrar
            $message = [
                'required' => 'El :attribute es requerido.'
            ];

            // Realizar validacion de los datos
            $this -> validate($request, $validate, $message);
            
            // Validar el estado, para enviar como true o false
            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            
            // Objeto con la informacion que es guardara, exceptuando el TOKEN
            $data = request()->except('_token');
            
            // Comprobar datos recibidos 
            // return response()->json($data);
            
            // Insertar el registro a la tabla
            $productCategories = ProductCategory::insert($data);
            return redirect('product_category');
        }catch(Exception $e){
            throw new Exception($e);
        }
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
    public function edit($id)
    {
        $productCategory = productCategory::findOrFail($id);
        return view('productCategory.edit', compact('productCategory'));
    }

    /**
     * @param \App\Http\Requests\ProductCategoryUpdateRequest $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            // Validacion del formulario 
            $validate = [
                'name' =>[
                    'required',
                    'string'
                ],
                'description' => [
                    'required',
                    'string'
                ]
            ];
            
            // Mensaje de error al mostrar
            $message = [
                'required' => 'El :attribute es requerido.'
            ];

            // Realizar validacion de los datos
            $this -> validate($request, $validate, $message);
            
            // Validar el estado, para enviar como true o false
            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            
            // Objeto con la informacion que es guardara, exceptuando el TOKEN
            $data = request()->except('_token','_method');
            
            // Comprobar datos recibidos 
            // return response()->json($data);
            
            // Actualizar datos cuando el id coincida
            ProductCategory::where('id','=',$id)->update($data);
            return redirect('product_category');
        }catch(Exception $e){
            throw new Exception($e);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $productCategory = ProductCategory::findOrFail($id);
            $productCategory->delete();
            return redirect('product_category');
        }catch(Exception $e){
            throw new Exception($e);
        }
    }
}
