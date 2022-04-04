<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\CivilStatus;
use App\Models\Customer;
use App\Models\CustomerType;
use App\Models\Email;
use App\Models\Entity;
use App\Models\Nationality;
use App\Models\Phone;
use App\Models\Sex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\throwException;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{

    /*---------------------------
        MENSAJES DE VALIDACION
    -----------------------------*/
    public function messageProduct(){
        return [

            'first_name.required' => 'El nombre es requerido.',
            'first_name.string' => 'El nombre debe ser un texto',

            'last_name.required' => 'El apellido es requerido.',
            'last_name.string' => 'El apellido debe ser un texto',

            'identification.required' => 'La cédula es requerida.',
            'identification.string' => 'La cédula debe ser un texto',
            'identification.unique:entities,identification' => 'La cédula ya existe',

            'sex_id.required' => 'El sexo es requerido.',
            'sex_id.integer' => 'Debe elegir un sexo.',

            'civil_status_id.required' => 'El estado civil es requerido.',
            'civil_status_id.integer' => 'Debe elegir un estado civil.',

            'nationality_id.required' => 'La nacionalidad es requerida.',
            'nationality_id.integer' => 'Debe elegir una nacionalidad.',

            'customer_type_id.required' => 'El tipo de cliente es requerido.',
            'customer_type_id.integer' => 'Debe elegir un tipo de cliente.',

            'email.required' => 'El correo electrónico es requerido.',
            'email.string' => 'El correo electrónico debe ser un texto.',
            'email.unique:emails,email' => 'El correo electrónico ya existe.',

            'phone.required' => 'El teléfono es requerido.',
            'phone.string' => 'El teléfono debe ser un texto.',
            'phone.unique:phones,phone' => 'El teléfono ya existe.',

        ];
    }

    /*----------
        INDEX
    ------------*/
    public function index()
    {

        $customers = DB::table('customers')
            ->join('entities', 'customers.entity_id', '=', 'entities.id')
            ->join('sexs', 'entities.sex_id', '=', 'sexs.id')
            ->join('civil_status', 'entities.civil_status_id', '=', 'civil_status.id')
            ->join('nationalities', 'entities.nationality_id', '=', 'nationalities.id')
            ->join('customer_types', 'customers.customer_type_id', '=', 'customer_types.id')
            ->select('customers.id as customer_id', 'entities.first_name', 'entities.last_name', 'entities.identification', 'entities.status as customer_status', 'entities.birth_date', 'customer_types.*', 'sexs.name as sex_name', 'civil_status.description as civil_status_name', 'nationalities.name as nationality_name')
            ->where('customers.deleted_at', '=', null)
            ->get();

        return view('customer.index', compact(['customers']));

    }

    /*-----------
        CREATE
    -------------*/
    public function create()
    {
        $sexs = Sex::all();
        $civilStatus = CivilStatus::all();
        $nationalities = Nationality::all();
        $customerTypes = CustomerType::all();
        return view('customer.create', compact(['sexs', 'civilStatus', 'nationalities', 'customerTypes']));
    }

    /*----------
        STORE
    ------------*/
    public function store(Request $request)
    {

        try {

            $validate = [
                "first_name" => 'required|string',
                "last_name" => 'required|string',
                "identification" => 'required|string|unique:entities,identification',
                "sex_id" => "required|integer",
                "civil_status_id" => "required|integer",
                "nationality_id" => "required|integer",
                "customer_type_id" => "required|integer",
                "email" => 'required|string|unique:emails,email',
                "phone" => 'required|string|unique:phones,phone',
            ];

            $this -> validate($request, $validate, $this->messageProduct());

            $request->except('_token');

            $entity = new Entity();
            $entity->first_name = $request['first_name'];
            $entity->last_name = $request['last_name'];
            $entity->identification = $request['identification'];
            $entity->sex_id = $request['sex_id'];
            $entity->civil_status_id = $request['civil_status_id'];
            $entity->nationality_id = $request['nationality_id'];
            $entity->status = true;
            $entity->birth_date = $request['birth_date'];
            $entity->save();

            $email = new Email();
            $email->entity_id = $entity->id;
            $email->status = true;
            $email->email = $request['email'];
            $email->save();

            $phone = new Phone();
            $phone->entity_id = $entity->id;
            $phone->status = true;
            $phone->phone = $request['phone'];
            $phone->save();

            $customer = new Customer();
            $customer->entity_id = $entity->id;
            $customer->customer_type_id = $request['customer_type_id'];
            $customer->save();

            Alert::toast('El cliente fue registrado correctamente', 'success');

            return redirect('customer');

        }catch (Exception $e){
            throwException($e);
        }

    }

    /*---------
        SHOW
    -----------*/
    public function show(Request $request, Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /*---------
        EDIT
    -----------*/
    public function edit($id)
    {

        $customers = DB::table('customers')
            ->join('entities', 'customers.entity_id', '=', 'entities.id')
            ->join('emails', 'entities.id', '=', 'emails.entity_id')
            ->join('phones', 'entities.id', '=', 'phones.entity_id')
            ->join('sexs', 'entities.sex_id', '=', 'sexs.id')
            ->join('civil_status', 'entities.civil_status_id', '=', 'civil_status.id')
            ->join('nationalities', 'entities.nationality_id', '=', 'nationalities.id')
            ->join('customer_types', 'customers.customer_type_id', '=', 'customer_types.id')
            ->select('customers.id as customer_id', 'entities.id as entity_id', 'entities.first_name', 'entities.last_name', 'entities.identification', 'entities.status as customer_status', 'entities.birth_date', 'customer_types.name', 'customer_types.id as customer_types_id', 'sexs.name as sex_name', 'sexs.id as sex_id', 'civil_status.description as civil_status_name', 'civil_status.id as civil_status_id', 'nationalities.name as nationality_name', 'nationalities.id as nationality_id', 'emails.email', 'phones.phone')
            ->where('customers.deleted_at', '=', null)
            ->where('customers.id', '=', $id)
            ->first();

        $sexs = Sex::all();
        $civilStatus = CivilStatus::all();
        $nationalities = Nationality::all();
        $customerTypes = CustomerType::all();

        return view('customer.edit', compact(['customers', 'sexs', 'civilStatus', 'nationalities', 'customerTypes']));

    }

    /*-----------
        UPDATE
    -------------*/
    public function update(Request $request, $id)
    {

        $validate = [
            "first_name" => 'required|string',
            "last_name" => 'required|string',
            "identification" => 'required|string',
            "sex_id" => "required|integer",
            "civil_status_id" => "required|integer",
            "nationality_id" => "required|integer",
            "customer_type_id" => "required|integer",
            "email" => 'required|string',
            "phone" => 'required|string',
        ];

        $this -> validate($request, $validate, $this->messageProduct());

        $request->except('_token');

        Entity::where('id', '=', $id)->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'identification' => $request['identification'],
            'sex_id' => $request['sex_id'],
            'civil_status_id' => $request['civil_status_id'],
            'nationality_id' => $request['nationality_id'],
            'status' => true,
            'birth_date' => $request['birth_date'],
        ]);

        Email::where('id', '=', $id)->update([
            'entity_id' => $id,
            'status' => true,
            'email' => $request['email'],
        ]);

        Phone::where('id', '=', $id)->update([
            'entity_id' => $id,
            'status' => true,
            'phone' => $request['phone'],
        ]);

        Customer::where('id', '=', $id)->update([
            'entity_id' => $id,
            'customer_type_id' => $request['customer_type_id'],
        ]);

        Alert::success('Los datos del cliente fueron actualizados correctamente', 'success');

        return redirect('customer');

    }

    /*------------
        DESTROY
    --------------*/
    public function destroy($id)
    {

        try{

            $customer = Customer::findOrFail($id);

            $customer->delete();

            return redirect('customer');

        }catch (\Exception $e){

            throwException($e);

        }

    }

}
