<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivingRoomStoreRequest;
use App\Http\Requests\LivingRoomUpdateRequest;
use App\Models\LivingRoom;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \RealRashid\SweetAlert\Facades\Alert;

class LivingRoomController extends Controller
{

    public function messageProduct(){
        return [
            'name.required' => 'El nombre del salon es requerido.',
            'name.string' => 'El nombre debe ser un texto.',
            'name.unique' => 'El nombre debe ser único.',
            'tables_capacity.required' => 'La capacidad de mesas es requerida.',
            'tables_capacity.numeric' => 'La capacidad de mesas debe ser un número.'
        ];
    }

    public function index()
    {
        $livingRooms = LivingRoom::all();

        return view('livingRoom.index', compact('livingRooms'));
    }

    public function create()
    {
        return view('livingRoom.create');
    }

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

            // Realizar validacion de los datos
            $this -> validate($request, $validate, $this->messageProduct());

            // Validar el estado, para enviar como true o false
            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            (empty($request['description'])) ? $request['description'] = "" : null;

            // Objeto con la informacion que es guardara, exceptuando el TOKEN
            $data = request()->except('_token');
            $data['name'] = ucfirst(strtolower($data['name']));
            $data['description'] = ucfirst(strtolower($data['description']));
            $data['created_at'] = Carbon::now();

            // Inserto el registro en la tabla
            $livingRooms = LivingRoom::insert($data);

            Alert::success('El salon fue creado correctamente');

            return redirect('livingrooms');

        }catch(Exception $e){
            throw new Exception($e);
        }
    }

    public function show(Request $request, LivingRoom $livingRoom)
    {
        return view('livingRoom.show', compact('livingRoom'));
    }

    public function edit($id)
    {
        $livingRoom = LivingRoom::findOrFail($id);
        return view('livingRoom.edit', compact('livingRoom'));
    }

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

        // Realizar validacion de los datos
        $this -> validate($request, $validate, $this->messageProduct());
        // Validar el estado, para enviar como true o false
        ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
        (empty($request['description'])) ? $request['description'] = $request['name'] : null;

        // Objeto con la informacion que es guardara, exceptuando el TOKEN
        $data = request()->except('_token','_method');
        $data['name'] = ucfirst(strtolower($data['name']));
        $data['description'] = ucfirst(strtolower($data['description']));
        $data['updated_at'] = Carbon::now();
        // Actualizar datos cuando el id coincida
        LivingRoom::where('id','=',$id)->update($data);

        Alert::success('Los datos del salon fueron actualizados correctamente');

        return redirect('livingrooms');

    }

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
