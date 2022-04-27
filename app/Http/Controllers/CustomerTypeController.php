<?php

namespace App\Http\Controllers;

use App\Http\Requests\customerTypeStoreRequest;
use App\Http\Requests\customerTypeUpdateRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerType;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerTypeController extends Controller
{

    /*------------
        MENSAJE
    --------------*/
    public function message(){

        return [

            'name.required' => 'El nombre del tipo de cliente es requerido.',
            'name.string' => 'El nombre del tipo de cliente debe ser un texto.',

            'description.required' => 'La descripción es requerida.',
            'description.string' => 'La descripcion del tipo de cliente debe ser un texto.',

        ];

    }

    /*----------
        INDEX
    ------------*/
    public function index()
    {
        $customerTypes = CustomerType::all();
        return view('customerType.index', compact('customerTypes'));
    }

    /*-----------
        CREATE
    -------------*/
    public function create()
    {
        return view('customerType.create');
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
                    'unique:customer_types,name'
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

            CustomerType::insert($data);

            Alert::success('El tipo de cliente fue creado correctamente!');

            return redirect('customer-type');

        }catch (Exception $e){

            DB::rollBack();

            throw new Exception($e);

        }

    }

    public function show($id)
    {
        return view('customerType.show');
    }

    public function edit($id)
    {
        $customerType = CustomerType::findOrFail($id);
        return view('customerType.edit', compact(['customerType']));
    }

    public function update(Request $request, $id)
    {

        try {

            $validate = [
                'name' =>[
                    'required',
                    'string',
                    'unique:customer_types,name,'.$id
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

            CustomerType::where('id', '=', $id)->update($data);

            Alert::success('Los datos del tipo de cliente fueron actualizados correctamente!');

            return redirect('customer-type');

        }catch (Exception $e){

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

            $customerType = CustomerType::findOrFail($id);

            $customerType->delete();

            return redirect('customer-type');

        }catch (Exception $e){

            DB::rollBack();

            throwException($e);

        }

    }

}
