<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseTypeStoreRequest;
use App\Http\Requests\WarehouseTypeUpdateRequest;
use App\Models\WarehouseType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use function PHPUnit\Framework\throwException;

class WarehouseTypeController extends Controller
{

    /*-------------
        MENSAJES
    ---------------*/
    public function message(){

        return [

            'name.required' => 'El nombre del almacen es requerido.',
            'name.string' => 'El nombre del almacen debe ser un texto.',

            'description.required' => 'La descripción es requerida.',
            'description.string' => 'La descripcion del almacen debe ser un texto.',

        ];

    }

    /*----------
        INDEX
    ------------*/
    public function index(Request $request)
    {
        $warehouseTypes = WarehouseType::all();
        return view('warehouseType.index', compact('warehouseTypes'));
    }

    /*-----------
        CREATE
    -------------*/
    public function create()
    {
        return view('warehouseType.create');
    }

    /*----------
        STORE
    ------------*/
    public function store(Request $request)
    {

        try {

            $validate = [
                'name' =>[
                    'required',
                    'string',
                ],
                'description' => [
                    'required',
                    'string'
                ]
            ];

            $this -> validate($request, $validate, $this->message());

            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            (empty($request['description'])) ? $request['description'] = $request['name'] : null;

            $data = request()->except('_token');
            $data['name'] = ucfirst(strtolower($data['name']));
            $data['description'] = ucfirst(strtolower($data['description']));
            $data['created_at'] = Carbon::now();

            WarehouseType::insert($data);

            Alert::success('El almacen fue creado correctamente!');

            return redirect('warehouse');

        }catch (Exception $e){

            DB::rollBack();

            throw new Exception($e);

        }

    }

    public function show($id)
    {
        return view('warehouseType.show');
    }

    /*---------
        EDIT
    -----------*/
    public function edit($id)
    {
        $warehouses = WarehouseType::findOrFail($id);
        return view('warehouseType.edit', compact(['warehouses']));
    }

    /*----------
        STORE
    ------------*/
    public function update(Request $request, $id)
    {

        try {

            $validate = [
                'name' =>[
                    'required',
                    'string',
                    'unique:warehouse_type,name,'.$id
                ],
                'description' => [
                    'required',
                    'string'
                ]
            ];

            $this -> validate($request, $validate, $this->message());

            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            (empty($request['description'])) ? $request['name'] = "" : null;

            $data = request()->except('_token', '_method');
            $data['name'] = ucfirst(strtolower($data['name']));
            $data['description'] = ucfirst(strtolower($data['description']));
            $data['updated_at'] = Carbon::now();

            WarehouseType::where('id','=',$id)->update($data);

            Alert::success('Los datos del tipo de orden fueron actualizados correctamente!');

            return redirect('warehouse');

        }catch (Exception $e){

            DB::rollBack();

            throwException($e);

        }

    }

    /*------------
        DESTROY
    --------------*/
    public function destroy($id)
    {
        try {

            $warehouses = WarehouseType::findOrFail($id);

            $warehouses->delete();

            return redirect('warehouse');

        }catch (Exception $e){

            DB::rollBack();

            throwException($e);

        }

    }

}
