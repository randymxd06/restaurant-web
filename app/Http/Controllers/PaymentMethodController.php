<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethodStoreRequest;
use App\Http\Requests\PaymentMethodUpdateRequest;
use App\Models\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use function PHPUnit\Framework\throwException;

class PaymentMethodController extends Controller
{

    /*-----------------------------
        MENSAJES DE VALIDACIONES
    -------------------------------*/
    public function message(){

        return [

            'name.required' => 'El nombre del metodo de pago es requerido.',
            'name.string' => 'El nombre del metodo de pago debe ser un texto.',

            'description.required' => 'La descripción es requerida.',
            'description.string' => 'La descripcion del metodo de pago debe ser un texto.',

        ];

    }

    /*----------
        INDEX
    ------------*/
    public function index(Request $request)
    {
        $paymentMethods = PaymentMethod::all();

        return view('paymentMethod.index', compact('paymentMethods'));
    }

    /*-----------
        CREATE
    -------------*/
    public function create(Request $request)
    {
        return view('paymentMethod.create');
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
                    'unique:payment_method,name'
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

            PaymentMethod::insert($data);

            Alert::success('El metodo de pago fue creado correctamente!');

            return redirect('payment-method');

        }catch (Exception $e){

            DB::rollBack();

            throwException($e);

        }

    }

    public function show($id)
    {
        return view('paymentMethod.show', compact('paymentMethod'));
    }

    /*---------
        EDIT
    -----------*/
    public function edit($id)
    {

        $paymentMethods = PaymentMethod::findOrFail($id);

        return view('paymentMethod.edit', compact('paymentMethods'));

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
                    'unique:payment_method,name,'.$id
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

            PaymentMethod::where('id','=',$id)->update($data);

            Alert::success('Los datos del metodo de pago fueron actualizados correctamente!');

            return redirect('payment-method');

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

            $payment_methods = PaymentMethod::findOrFail($id);

            $payment_methods->delete();

            return redirect('payment-method');

        }catch (Exception $e){

            DB::rollBack();

            throwException($e);

        }

    }

}
