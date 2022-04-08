<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Http\Requests\ReservationUpdateRequest;
use App\Models\Customer;
use App\Models\LivingRoom;
use App\Models\Reservation;
use App\Models\TypeReservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use function PHPUnit\Framework\throwException;

class ReservationController extends Controller
{

    /*---------------------------
        MENSAJES DE VALIDACION
    -----------------------------*/
    public function messageProduct(){
        return [

            'customer_id.required' => 'El id del cliente es requerido',
            'customer_id.integer' => 'Debe seleccionar un cliente',

            'type_reservations_id.required' => 'El tipo de reservacion es requerido',
            'type_reservations_id.integer' => 'Debe seleccionar el tipo de reservacion',

            'living_room_id.required' => 'El salon es requerido',
            'living_room_id.integer' => 'Debe seleccionar un salon',

            'date_time.required' => 'La fecha es requerida',

            'number_people.required' => 'El numero de personas es requerido',
            'number_people.string' => 'Debe escribir la cantidad de personas',

            'description.required' => 'La description es requerida',
            'description.string' => 'Debe poner alguna description',

        ];
    }

    /*----------
        INDEX
    ------------*/
    public function index()
    {

        $reservations = Reservation::all();

        return view('reservation.index', compact(['reservations']));

    }

    /*-----------
        CREATE
    -------------*/
    public function create()
    {

        $customers = DB::table('customers')
            ->join('entities', 'customers.entity_id', '=', 'entities.id')
            ->join('emails', 'entities.id', '=', 'emails.entity_id')
            ->join('phones', 'entities.id', '=', 'phones.entity_id')
            ->select('entities.id', 'entities.first_name', 'entities.last_name', 'emails.email', 'phones.phone')
            ->get();

        $livingRooms = LivingRoom::all();
        $typeReservations = TypeReservation::all();

        return view('reservation.create', compact(['customers', 'livingRooms', 'typeReservations']));

    }

    /*----------
        STORE
    ------------*/
    public function store(Request $request)
    {

        DB::beginTransaction();

        try {

            // ARRAY CON VALIDACIONES //
            $validate = [
                'customer_id' => 'required|integer',
                'type_reservations_id' => 'required|integer',
                'living_room_id' => 'required|integer',
                'date_time' => 'required',
                'number_people' => 'required|string',
                'description' => 'required|string',
            ];

            // VALIDO LOS CAMPOS //
            $this -> validate($request, $validate, $this->messageProduct());

            DB::commit();

//            $reservationExists = Reservation::where('living_room_id', $request['living_room_id'])
////                ->where('date_time', $request['date_time'])
//                ->first();

            Reservation::insert([
                'customer_id' => $request['customer_id'],
                'type_reservations_id' => $request['type_reservations_id'],
                'living_room_id' => $request['living_room_id'],
                'date_time' => $request['date_time'],
                'number_people' => $request['number_people'],
                'description' => $request['description'],
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Alert::success('La reservacion fue creada exitosamente', 'success');

            return redirect('reservation');

        }catch (\Exception $e){

            DB::rollBack();

            throwException($e);

        }

    }

    public function show(Request $request, Reservation $reservation)
    {
        return view('reservation.show', compact('reservation'));
    }

    public function edit(Request $request, Reservation $reservation)
    {
        return view('reservation.edit', compact('reservation'));
    }

    public function update(ReservationUpdateRequest $request, Reservation $reservation)
    {
        $reservation->update($request->validated());

        $request->session()->flash('reservation.id', $reservation->id);

        return redirect()->route('reservation.index');
    }

    /*------------
        DESTROY
    --------------*/
    public function destroy($id)
    {

        $reservation = Reservation::findOrFail($id);

        $reservation->delete();

        return redirect('reservation');

    }

}
