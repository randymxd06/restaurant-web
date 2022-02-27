<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableStoreRequest;
use App\Http\Requests\TableUpdateRequest;
use App\Models\Table;
use Illuminate\Http\Request;

/*---------------------
    TABLE CONTROLLER
-----------------------*/
class TableController extends Controller
{

    /*-------------------------------------------------------------------------------------------
        METODO INDEX
        NOTA: ESTE METODO ES PARA MOSTRAR LA PAGINA DONDE SE MUESTRAN TODAS LAS MESAS ACTIVAS.
    ---------------------------------------------------------------------------------------------*/
    public function index()
    {

        // OBTENGO TODAS LAS MESAS QUE ESTEN ACTIVAS //
        $tables = Table::all()->where('status', '=', true);

        // MUESTRO LA PAGINA PRINCIPAL Y LE MANDO EL OBJETO CON LAS MESAS//
        return view('table.index', compact('tables'));

    }// FIN DEL METODO INDEX //

    /*---------------------------------------------------------------------------------------------------
        METODO CREATE
        NOTA: ESTE METODO ES PARA MOSTRAR LA PAGINA DONDE ESTA EL FORMULARIO PARA CREAR NUEVAS MESAS.
    ----------------------------------------------------------------------------------------------------*/
    public function create()
    {

        // MUESTRO LA PAGINA DEL FORMULARIO DE MESAS //
        return view('table.create');

    }// FIN DEL METOOD CREATE //

    /*---------------------------------------------------------------------------------------------------
        METODO STORE
        NOTA: ESTE ES EL METODO PARA GUARDAR LOS DATOS QUE SE ENVIEN DESDE EL FORMULARIO DE LAS MESAS.
    -----------------------------------------------------------------------------------------------------*/
    public function store(Request $request)
    {

        try{

            // HAGO LA VALIDACION DEL STATUS, PARA ENVIARLA COMO TRUE O FALSE //
            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;

            // ESTE ES EL OBJETO CON LA INFORMACION QUE SE VA A GUARDAR //
            $json = [
                'people_capacity' => (int) $request['people_capacity'],
                'living_room_id' => (int) $request['living_room_id'],
                'description' => strtoupper($request['description']),
                'status' => $request['status']
            ];

            // CREO LA MESA //
            $tables = Table::insert($json);

            // UNA VEZ CREADA LA MESA, ME REDIRECCIONO A LA PAGINA PRINCIPAL //
            return redirect('mesas');

        }catch(Exception $e){

            dd($e);

        }

    }// FIN DEL METODO STORE //

    public function show($id)
    {
       // return view('table.show', compact('table'));
    }

    public function edit(Request $request, Table $table)
    {
        return view('table.edit', compact('table'));
    }

    public function update(TableUpdateRequest $request, Table $table)
    {
        $table->update($request->validated());
        $request->session()->flash('table.id', $table->id);
        return redirect()->route('table.index');
    }

    public function destroy(Request $request, Table $table)
    {
        $table->delete();
        return redirect()->route('table.index');
    }

}
