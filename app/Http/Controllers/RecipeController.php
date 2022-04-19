<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeUpdateRequest;
use App\Models\Product;
use App\Models\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class RecipeController extends Controller
{

    /*---------------------------
        MENSAJES DE VALIDACION
    -----------------------------*/
    public function messageProduct(){

        return [

            'product_id.required' => 'El producto es requerido.',
            'product_id.integer' => 'Debe seleccionar un producto.',

            'name.required' => 'El nombre de la receta es requerida.',
            'name.string' => 'Debe escribir el nombre de la receta.',

            'instructions.required' => 'Las instrucciones de la receta es requerida.',
            'instructions.string' => 'Debe escribir las instrucciones de la receta.',

        ];

    }

    /*----------
        INDEX
    ------------*/
    public function index()
    {

        $recipes = DB::table('recipes')
            ->join('products', 'recipes.product_id', '=', 'products.id')
            ->select('recipes.id', 'recipes.name', 'recipes.instructions', 'recipes.status', 'products.name as product_name')
            ->get();

        return view('recipe.index', compact('recipes'));

    }

    /*-----------
        CREATE
    -------------*/
    public function create()
    {

        $products = Product::all()->where('status', '=', true);

        return view('recipe.create', compact(['products']));

    }

    /*----------
        STORE
    ------------*/
    public function store(Request $request)
    {

        try {

            // ARRAY CON VALIDACIONES //
            $validate = [
                'product_id' => 'required|integer',
                'name' => 'required|string',
                'instructions' => 'required|string'
            ];

            // TRANSFORMO EL STATUS DE ON A TRUE Y DE OFF A FALSE //
            ($request['status'] == 'on') ? $request['status'] = 1 : $request['status'] = 0;

            // VALIDO LOS CAMPOS //
            $this -> validate($request, $validate, $this->messageProduct());

            Recipe::insert([
                'product_id' => $request['product_id'],
                'name' => $request['name'],
                'instructions' => $request['instructions'],
                'status' => $request['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            Alert::success('La receta fue creada correctamente!');

            return redirect('recipes');

        }catch (\Exception $e){

            DB::rollBack();

            throw new \Exception($e);

        }

    }

    public function show($id)
    {

        return view('recipe.show');

    }

    /*---------
        EDIT
    -----------*/
    public function edit($id)
    {

        $recipes = Recipe::findOrFail($id);

        $products = Product::all()->where('status', '=', true);

        return view('recipe.edit', compact(['products', 'recipes']));

    }

    /*-----------
        UPDATE
    -------------*/
    public function update(Request $request, $id)
    {

        try {

            // ARRAY CON VALIDACIONES //
            $validate = [
                'product_id' => 'required|integer',
                'name' => 'required|string',
                'instructions' => 'required|string'
            ];

            // TRANSFORMO EL STATUS DE ON A TRUE Y DE OFF A FALSE //
            ($request['status'] == 'on') ? $request['status'] = 1 : $request['status'] = 0;

            // VALIDO LOS CAMPOS //
            $this -> validate($request, $validate, $this->messageProduct());

            DB::table('recipes')->where('id', '=', $id)->update([
                'product_id' => $request['product_id'],
                'name' => $request['name'],
                'instructions' => $request['instructions'],
                'status' => $request['status'],
                'updated_at' => Carbon::now(),
            ]);

            Alert::success('Los datos de la receta fueron actualizados correctamente!');

            return redirect('recipes');

        }catch (\Exception $e){

            DB::rollBack();

            throw new Exception($e);

        }

    }

    /*------------
        DESTROY
    --------------*/
    public function destroy($id)
    {
        try {

            $recipe = Recipe::findOrFail($id);

            $recipe->delete();

            return redirect('recipes');

        }catch (\Exception $e){

            DB::rollBack();

            throw new \Exception($e);

        }

    }

}
