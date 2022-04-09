<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Http\Requests\ReservationUpdateRequest;
use App\Models\Customer;
use App\Models\LivingRoom;
use App\Models\Reservation;
use App\Models\TypeReservation;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Nette\Utils\DateTime;
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

        $reservations = DB::table('reservations')
            ->join('customers', 'reservations.customer_id', '=', 'customers.id')
            ->join('entities', 'customers.entity_id', '=', 'entities.id')
            ->join('type_reservations', 'reservations.type_reservations_id', '=', 'type_reservations.id')
            ->join('living_rooms', 'reservations.living_room_id', '=', 'living_rooms.id')
            ->select(
                'entities.first_name',
                'entities.last_name',
                'entities.identification',
                'reservations.status',
                'reservations.id',
                'type_reservations.name as reservation_type',
                'living_rooms.name as reservation_living_room',
                'reservations.date_time',
                'reservations.number_people',
                'reservations.description'
            )
            ->where('reservations.deleted_at', '=', null)
            ->get();

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

    /*---------
        EDIT
    -----------*/
    public function edit($id)
    {

        // ESTE ES PARA SELECCIONAR UN CLIENTE //
        $customers = DB::table('customers')
            ->join('entities', 'customers.entity_id', '=', 'entities.id')
            ->join('emails', 'entities.id', '=', 'emails.entity_id')
            ->join('phones', 'entities.id', '=', 'phones.entity_id')
            ->select('entities.id', 'entities.first_name', 'entities.last_name', 'emails.email', 'phones.phone')
            ->get();

        // ESTE ME TRAE LA INFORMACION DEL CLIENTE QUE HIZO LA RESERVACION QUE SE ESTA EDITANDO //
        $dbCustomer = DB::table('reservations')
            ->join('customers', 'reservations.customer_id', '=', 'customers.id')
            ->join('entities', 'customers.entity_id', '=', 'entities.id')
            ->join('emails', 'entities.id', '=', 'emails.entity_id')
            ->join('phones', 'entities.id', '=', 'phones.entity_id')
            ->select(
                'entities.first_name',
                'entities.last_name',
                'emails.email',
                'phones.phone',
                'reservations.customer_id',
                'reservations.type_reservations_id',
                'reservations.living_room_id',
                'reservations.date_time',
                'reservations.number_people',
                'reservations.description',
            )
            ->where('reservations.id', '=', $id)
            ->first();

        // PARA MOSTRAR LA FECHA DE LA RESERVACION EN UN FORMATO CORRECTO PARA MOSTRARLO EN EL INPUT //
        $date = date('Y-m-d', strtotime($dbCustomer->date_time));
        $time = date('H:i', strtotime($dbCustomer->date_time));
        $date_time = $date.'T'.$time;

        $livingRooms = LivingRoom::all();
        $typeReservations = TypeReservation::all();

        return view('reservation.edit', compact(['date_time', 'dbCustomer', 'id', 'customers', 'livingRooms', 'typeReservations']));

    }

    public function update(Request $request, $id)
    {

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

            $this -> validate($request, $validate, $this->messageProduct());

            $request->except('_token');

            Reservation::where('id', '=', $id)->update([
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

            Alert::success('Los datos de la reservacion fueron actualizados exitosamente', 'success');

            return redirect('reservation');

        }catch (\Exception $e){
            throwException($e);
        }

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
