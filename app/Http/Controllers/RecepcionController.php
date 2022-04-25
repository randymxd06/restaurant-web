<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecepcionStoreRequest;
use App\Http\Requests\RecepcionUpdateRequest;
use App\Models\Reservation;
use App\Recepcion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RecepcionController extends Controller
{

    /*----------
        INDEX
    ------------*/
    public function index()
    {

        $todayDate = date('Y-m-d', strtotime(Carbon::now()));

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
                'reservations.reservation_date',
                'reservations.reservation_time',
                'reservations.number_people',
                'reservations.description'
            )
            ->where('reservations.deleted_at', '=', null)
            ->where('reservations.reservation_date', '=', $todayDate)
            ->get();

        return view('recepcion.index', compact(['reservations','todayDate']));

    }

    public function create()
    {
        return view('recepcion.create');
    }

    public function store(Request $request)
    {
        return redirect('recepcion');
    }

    public function show($id)
    {
        return view('recepcion.show');
    }

    public function edit(Request $request, $id)
    {
        return view('recepcion.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect('recepcion');
    }

    public function destroy($id)
    {
        return redirect('recepcion');
    }

}
