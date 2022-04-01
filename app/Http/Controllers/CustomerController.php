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

            'sex_id.required' => 'El sexo es requerido.',
            'sex_id.integer' => 'Debe elegir un sexo',

            'civil_status_id.required' => 'El estado civil es requerido.',
            'civil_status_id.integer' => 'Debe elegir un estado civil',

            'nationality_id.required' => 'La nacionalidad es requerida.',
            'nationality_id.integer' => 'Debe elegir una nacionalidad',

            'customer_type_id.required' => 'El tipo de cliente es requerido.',
            'customer_type_id.integer' => 'Debe elegir un tipo de cliente',

            'email.required' => 'El correo electrónico es requerido.',
            'email.string' => 'El correo electrónico debe ser un texto',

            'phone.required' => 'El teléfono es requerido.',
            'phone.string' => 'El teléfono debe ser un texto',

            'birth_date.required' => 'la fecha es requerida.',
            'birth_date.date' => 'la fecha debe ser una fecha',

        ];
    }

    public function index()
    {
        $customers = DB::table('customers')
            ->join('entities', 'customers.entity_id', '=', 'entities.id')
            ->join('customer_types', 'customers.customer_type_id', '=', 'customer_types.id')
            ->select('customers.*', 'entities.first_name', 'entities.status', 'entities.identification', 'customer_types.name')
            ->get();

        return view('customer.index', compact(['customers']));
    }

    public function create()
    {
        $sexs = Sex::all();
        $civilStatus = CivilStatus::all();
        $nationalities = Nationality::all();
        $customerTypes = CustomerType::all();
        return view('customer.create', compact(['sexs', 'civilStatus', 'nationalities', 'customerTypes']));
    }

    public function store(Request $request)
    {

        try {

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
                "birth_date" => 'required|date'
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

            return redirect('customer');

        }catch (\Exception $e){
            throwException($e);
        }

    }

    public function show(Request $request, Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(Request $request, Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        $request->session()->flash('customer.id', $customer->id);
        return redirect()->route('customer.index');
    }

    public function destroy(Request $request, Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index');
    }

}
