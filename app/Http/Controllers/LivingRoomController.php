<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivingRoomStoreRequest;
use App\Http\Requests\LivingRoomUpdateRequest;
use App\Models\LivingRoom;
use Illuminate\Http\Request;

class LivingRoomController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livingRooms = LivingRoom::all();

        return view('livingRoom.index', compact('livingRooms'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livingRoom.create');
    }

    /**
     * @param \App\Http\Requests\LivingRoomStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            // Validacion del formulario
            $validate = [
                'name' => [
                    'required',
                    'string',
                    'unique:living_rooms,name'
                ],
                'tables_capacity' => 'required|numeric',
            ];

            // Mensaje de error al mostrar
            $message = [
                'required' => 'El :attribute es requerido.'
            ];
            // Realizar validacion de los datos 
            $this -> validate($request, $validate, $message);

            // Validar el estado, para enviar como true o false
            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;

            // Objeto con la informacion que es guardara, exceptuando el TOKEN
            $data = request()->except('_token');

            // Comprobar datos recibidos
            // return response()->json($data);
            
            // Inserto el registro en la tabla
            $livingRooms = LivingRoom::insert($data);
            return redirect('livingrooms');
        }catch(Exception $e){
            throw new Exception($e);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LivingRoom $livingRoom
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LivingRoom $livingRoom)
    {
        return view('livingRoom.show', compact('livingRoom'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LivingRoom $livingRoom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livingRoom = LivingRoom::findOrFail($id);
        return view('livingRoom.edit', compact('livingRoom'));
    }

    /**
     * @param \App\Http\Requests\LivingRoomUpdateRequest $request
     * @param \App\Models\LivingRoom $livingRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validacion del formulario
        $validate = [
            'name' => [
                'required',
                'string',
                'unique:living_rooms,name,'.$id
            ],
            'tables_capacity' => 'required|numeric',
        ];

        // Mensaje de error al mostrar
        $message = [
            'required' => 'El :attribute es requerido.'
        ];
        // Realizar validacion de los datos 
        $this -> validate($request, $validate, $message);

        // Validar el estado, para enviar como true o false
        ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;

        // Objeto con la informacion que es guardara, exceptuando el TOKEN
        $data = request()->except('_token','_method');
        
        // Actualizar datos cuando el id coincida
        LivingRoom::where('id','=',$id)->update($data);
        return redirect('livingrooms');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LivingRoom $livingRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $livingRoom = LivingRoom::findOrFail($id);
            $livingRoom->delete();
            return redirect('livingrooms');
        }catch(Exception $e){
            throw new Exception($e);
        }
    }
}
