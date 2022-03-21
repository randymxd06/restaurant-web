<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductCategoryController extends Controller
{

    // Mensaje de error al mostrar
    public function messageProduct(){
        return [
            'name.required' => 'El nombre de categoria es requerido.',
            'name.string' => 'El nombre de la categoria debe ser un texto.',
            'name.unique' => 'Este nombre de la categoria ya existe.',
            // 
            'description.string' => 'La descripcion de la categoria debe ser un texto.',
            'description.required' => 'La descripción es requerido.'
        ];
    }

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
            
            // Realizar validacion de los datos
            $this -> validate($request, $validate, $this->messageProduct());
            
            // Validar el estado, para enviar como true o false
            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            
            // Objeto con la informacion que es guardara, exceptuando el TOKEN
            $data = request()->except('_token');
            $data['name'] = ucfirst(strtolower($data['name']));
            $data['description'] = ucfirst(strtolower($data['description']));
            $data['created_at'] = Carbon::now();

            // Comprobar datos recibidos 
            // return response()->json($data);
            
            // Insertar el registro a la tabla
            ProductCategory::insert($data);
            return redirect('product_category');
        }catch(Exception $ex){
            throw new Exception($ex);
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
        $productCategory = ProductCategory::findOrFail($id);
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
                    'string',
                    'unique:product_categories,name,'.$id
                ],
                'description' => [
                    'required',
                    'string'
                ]
            ];

            // Realizar validacion de los datos
            $this -> validate($request, $validate, $this->messageProduct());
            
            // Validar el estado, para enviar como true o false
            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            
            // Objeto con la informacion que es guardara, exceptuando el TOKEN
            $data = request()->except('_token', '_method');
            $data['name'] = ucfirst(strtolower($data['name']));
            $data['description'] = ucfirst(strtolower($data['description']));
            $data['updated_at'] = Carbon::now();
            
            // Comprobar datos recibidos 
            // return response()->json($data);
            
            // Actualizar datos cuando el id coincida
            ProductCategory::where('id','=',$id)->update($data);
            return redirect('product_category');
        }catch(Exception $ex){
            throw new Exception($ex);
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
        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }
}
