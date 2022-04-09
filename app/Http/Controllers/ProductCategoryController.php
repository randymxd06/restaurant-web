<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function index(Request $request)
    {
        $productCategories = ProductCategory::all();

        return view('productCategory.index', compact('productCategories'));
    }

    public function create(Request $request)
    {
        return view('productCategory.create');
    }

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
                    // 'required',
                    // 'string'
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
            $data['description'] = ucfirst(strtolower($data['description']));
            $data['created_at'] = Carbon::now();

            // Insertar el registro a la tabla
            ProductCategory::insert($data);

            Alert::success('La categoria de producto fue creada correctamente!');

            return redirect('product_category');

        }catch(Exception $ex){
            throw new Exception($ex);
        }

    }

    public function show(Request $request, ProductCategory $productCategory)
    {
        return view('productCategory.show', compact('productCategory'));
    }

    public function edit($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        return view('productCategory.edit', compact('productCategory'));
    }

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
            (empty($request['description'])) ? $request['name'] = "" : null;

            // Objeto con la informacion que es guardara, exceptuando el TOKEN
            $data = request()->except('_token', '_method');
            $data['name'] = ucfirst(strtolower($data['name']));
            $data['description'] = ucfirst(strtolower($data['description']));
            $data['updated_at'] = Carbon::now();

            // Actualizar datos cuando el id coincida
            ProductCategory::where('id','=',$id)->update($data);

            Alert::success('Los datos de la categoria de producto fueron actualizados correctamente!');

            return redirect('product_category');

        }catch(Exception $ex){
            throw new Exception($ex);
        }
    }

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
