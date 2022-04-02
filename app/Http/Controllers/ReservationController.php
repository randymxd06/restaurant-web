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

    public function store(Request $request)
    {

        // ARRAY CON VALIDACIONES //
//        $validate = [
//            'customer_id' => 'required|integer',
//            'type_reservations_id' => 'required|integer',
//            'living_room_id' => 'required|integer',
//            'date_time' => 'required',
//            'number_people' => 'required|string',
//            'description' => 'required|string',
//        ];

        // VALIDO LOS CAMPOS //
//        $this -> validate($request, $validate, $this->messageProduct());

        dd($request->all());

        // ESTE JSON ES DE PRUEBA HAY QUE BORRARLO //
//        $jsonReservation = [
//            'customer_id' => 1,
//            'type_reservations_id' => 1,
//            'living_room_id' => 1,
//            'date_time' => '2020-01-01 10:10:10',
//            'number_people' => 10,
//            'description' => 'Esta es una prueba.',
//            'status' => true,
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now(),
//        ];

//        Reservation::insert([
//            'customers_id' => $request['customers_id'],
//            'type_reservations_id' => $request['type_reservations_id'],
//            'living_room_id' => $request['living_room_id'],
//            'date_time' => $request['date_time'],
//            'number_people' => $request['number_people'],
//            'description' => $request['description'],
//            'status' => true
//        ]);

        return redirect('reservation');

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

    public function destroy(Request $request, Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservation.index');
    }

}
