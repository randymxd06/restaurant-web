<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableStoreRequest;
use App\Http\Requests\TableUpdateRequest;
use App\Models\Table;
use App\Models\LivingRoom;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

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
        // OBTENGO TODAS LAS MESAS //
        $tables = Table::all();//->where('status', '=', true);
        // Obtengo todos los salones
        $LivingRooms = LivingRoom::all();
        // MUESTRO LA PAGINA PRINCIPAL Y LE MANDO EL OBJETO CON LAS MESAS + El objeto con los salones//
        return view('table.index', compact('tables'))->with('LivingRooms', $LivingRooms);;
    }// FIN DEL METODO INDEX //

    /*---------------------------------------------------------------------------------------------------
        METODO CREATE
        NOTA: ESTE METODO ES PARA MOSTRAR LA PAGINA DONDE ESTA EL FORMULARIO PARA CREAR NUEVAS MESAS.
    ----------------------------------------------------------------------------------------------------*/
    public function create()
    {
        // MUESTRO LA PAGINA DEL FORMULARIO DE MESAS //
        $LivingRooms = LivingRoom::all()->where('status', '=', 1);
        return view('table.create')->with('LivingRooms', $LivingRooms);

    }// FIN DEL METOOD CREATE //

    /*---------------------------------------------------------------------------------------------------
        METODO STORE
        NOTA: ESTE ES EL METODO PARA GUARDAR LOS DATOS QUE SE ENVIEN DESDE EL FORMULARIO DE LAS MESAS.
    -----------------------------------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        try{
            // Validación del formulario
            $validate = [
                'people_capacity' => 'required|numeric',
                'living_room_id' => 'required|numeric',
            ];

            // Mensaje de error al mostrar
            $message = [
                'required' => 'El :attribute es requerido.'
            ];

            // Realizar la validacion de los datos
            $this -> validate($request, $validate, $message);

            // HAGO LA VALIDACION DEL STATUS, PARA ENVIARLA COMO TRUE O FALSE //
            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            // ESTE ES EL OBJETO CON LA INFORMACION QUE SE VA A GUARDAR //
            $json = [
                'people_capacity' => (int) $request['people_capacity'],
                'living_room_id' => (int) $request['living_room_id'],
                'description' => ucfirst(strtolower($request['description'])),
                'status' => $request['status']
            ];
            // CREO LA MESA //
            $tables = Table::insert($json);
            // UNA VEZ CREADA LA MESA, ME REDIRECCIONO A LA PAGINA PRINCIPAL //
            return redirect('tables');
        }catch(Exception $e){
            throw new Exception($e);
        }
    }// FIN DEL METODO STORE //

    public function show($id)
    {
       // return view('table.show', compact('table'));
    }

    public function edit($id)
    {
        $table = Table::findOrFail($id);
        $LivingRooms = LivingRoom::all()->where('status', '=', 1);
        return view('table.edit', compact('table'))->with('LivingRooms', $LivingRooms);
    }

    public function update(Request $request, $id)
    {
        // Validación del formulario
        $validate = [
            'people_capacity' => 'required|numeric',
            'living_room_id' => 'required|numeric',
        ];

        // Mensaje de error al mostrar
        $message = [
            'required' => 'El :attribute es requerido.'
        ];

        // Realizar la validacion de los datos
        $this -> validate($request, $validate, $message);

        $table = $request->except(['_token', '_method']);   
        // HAGO LA VALIDACION DEL STATUS, PARA ENVIARLA COMO TRUE O FALSE //
        (isset($table['status'])) ? $table['status'] = 1 : $table['status'] = 0;
        
        // ESTE ES EL OBJETO CON LA INFORMACION QUE SE VA A GUARDAR //
        $json = [
            'people_capacity' => (int) $table['people_capacity'],
            'living_room_id' => (int) $table['living_room_id'],
            'description' => ucfirst(strtolower($request['description'])),
            'status' => $table['status']
        ];
        Table::where('id','=',$id)->update($json);
        return redirect('tables');
    }

    /*-------------------------------------------------
        METODO DELETE
        NOTA: ESTE METODO ES PARA ELIMINAR UNA MESA.
    ---------------------------------------------------*/
    public function destroy($id)
    {
        try{
            // OBTENGO LA INFORMACION DE LA MESA //
            $table = Table::findOrFail($id);
            // ELIMINO LA MESA
            $table->delete();
            // REDIRECCIONO A LA RUTA DONDE SE ME MUESTRAN LAS MESAS //
            return redirect('tables');
        }catch(Exception $e){
            // EN DADO CASO DE QUE FALLE //
            throw new Exception($e);
        }
    }// FIN DEL METODO DELETE //

}
