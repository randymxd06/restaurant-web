<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientStoreRequest;
use App\Http\Requests\IngredientUpdateRequest;
use App\Models\Ingredient;
use App\Models\WarehouseType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class IngredientController extends Controller
{

    /*---------------------------
        MENSAJES DE VALIDACION
    -----------------------------*/
    public function messageProduct(){

        return [

            'name.required' => 'El nombre del ingrediente es requerido.',
            'name.string' => 'Debe escribir el nombre del ingrediente.',

            'description.required' => 'La descripcion es requerida.',
            'description.string' => 'Debe escribir una descripcion.',

            'warehouse_type_id.required' => 'El tipo de almacen es requerido.',
            'warehouse_type_id.integer' => 'Debe seleccionar un tipo de almacen.',

        ];

    }

    /*----------
        INDEX
    ------------*/
    public function index()
    {

        $ingredients = DB::table('ingredients')
            ->join('warehouse_type', 'ingredients.warehouse_type_id', '=', 'warehouse_type.id')
            ->join('ingredients_stocks', 'ingredients.id', '=', 'ingredients_stocks.ingredient_id')
            ->select('ingredients.id','ingredients_stocks.quantity', 'ingredients.name', 'ingredients.description', 'ingredients.status', 'warehouse_type.name as warehouse_type_name')
            ->get();

        return view('ingredient.index', compact('ingredients'));

    }

    /*-----------
        CREATE
    -------------*/
    public function create()
    {

        $warehouseTypes = WarehouseType::all();

        return view('ingredient.create', compact(['warehouseTypes']));

    }

    /*----------
        STORE
    ------------*/
    public function store(Request $request)
    {

        try {

            // ARRAY CON VALIDACIONES //
            $validate = [
                'name' => 'required|string',
                'description' => 'required|string',
                'warehouse_type_id' => 'required|integer',
            ];

            // TRANSFORMO EL STATUS DE ON A TRUE Y DE OFF A FALSE //
            ($request['status'] == 'on') ? $request['status'] = 1 : $request['status'] = 0;

            // VALIDO LOS CAMPOS //
            $this -> validate($request, $validate, $this->messageProduct());

            $ingredientsJson = [
                'name' => $request['name'],
                'description' => $request['description'],
                'warehouse_type_id' => $request['warehouse_type_id'],
                'status' => $request['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            Ingredient::insert($ingredientsJson);

            Alert::success('El ingrediente fue creado correctamente!');

            return redirect('ingredients');

        }catch (\Exception $e){

            DB::rollBack();

            throw new Exception($e);

        }

    }

    public function show($id)
    {
        return view('ingredient.show');
    }

    /*---------
        EDIT
    -----------*/
    public function edit($id)
    {

        $warehouseTypes = WarehouseType::all();

        $ingredients = Ingredient::findOrFail($id);

        return view('ingredient.edit', compact(['ingredients', 'warehouseTypes']));

    }

    public function update(Request $request, $id)
    {
        try {

            // ARRAY CON VALIDACIONES //
            $validate = [
                'name' => 'required|string',
                'description' => 'required|string',
                'warehouse_type_id' => 'required|integer',
            ];

            // TRANSFORMO EL STATUS DE ON A TRUE Y DE OFF A FALSE //
            ($request['status'] == 'on') ? $request['status'] = 1 : $request['status'] = 0;

            // VALIDO LOS CAMPOS //
            $this -> validate($request, $validate, $this->messageProduct());

            DB::table('ingredients')->where('id', '=', $id)->update([
                'name' => $request['name'],
                'description' => $request['description'],
                'warehouse_type_id' => $request['warehouse_type_id'],
                'status' => $request['status'],
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Los datos del ingrediente fueron actualizados correctamente!');

            return redirect('ingredients');

        }catch (\Exception $e){

            DB::rollBack();

            throw new \Exception($e);

        }

    }

    /*------------
        DESTROY
    --------------*/
    public function destroy($id)
    {
        try {
            $ingredients = Ingredient::findOrFail($id);
            $ingredients->delete();
            return redirect('ingredients');
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e);
        }

    }

}
