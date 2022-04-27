<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderTypeStoreRequest;
use App\Http\Requests\OrderTypeUpdateRequest;
use App\Models\Order;
use App\Models\OrderType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use function PHPUnit\Framework\throwException;

class OrderTypeController extends Controller
{

    public function message(){

        return [

            'name.required' => 'El nombre del tipo de orden es requerido.',
            'name.string' => 'El nombre del tipo de orden debe ser un texto.',

            'description.required' => 'La descripción es requerida.',
            'description.string' => 'La descripcion del tipo de orden debe ser un texto.',

        ];

    }

    /*----------
        INDEX
    ------------*/
    public function index()
    {

        $orderTypes = OrderType::all();

        return view('orderType.index', compact('orderTypes'));

    }

    /*-----------
        CREATE
    -------------*/
    public function create()
    {
        return view('orderType.create');
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
                    'unique:product_categories,name'
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

            OrderType::insert($data);

            Alert::success('El tipo de orden fue creado correctamente!');

            return redirect('order-type');

        }catch (Exception $e){

            DB::rollBack();

            throwException($e);

        }

    }

    public function show($id)
    {
        return view('orderType.show');
    }

    /*---------
        EDIT
    -----------*/
    public function edit($id)
    {
        $orderTypes = OrderType::findOrFail($id);
        return view('orderType.edit', compact(['orderTypes']));
    }

    /*-----------
        UPDATE
    -------------*/
    public function update(Request $request, $id)
    {
        try {

            $validate = [
                'name' =>[
                    'required',
                    'string',
                    'unique:order_types,name,'.$id
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

            OrderType::where('id','=',$id)->update($data);

            Alert::success('Los datos del tipo de orden fueron actualizados correctamente!');

            return redirect('order-type');

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

            $orderTypes = OrderType::findOrFail($id);

            $orderTypes->delete();

            return redirect('order-type');

        }catch (Exception $e){

            DB::rollBack();

            throwException($e);

        }

    }

}
