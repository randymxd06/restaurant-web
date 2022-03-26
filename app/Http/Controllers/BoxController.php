<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\BoxHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoxController extends Controller
{

    /*---------------------------
        MENSAJES DE VALIDACION
    -----------------------------*/
    public function messageProduct(){
        return [

            'start_time.required' => 'La hora de inicio es requerida.',
            'start_time.date_format:H:i' => 'La hora de inicio debe ser tipo 00:00.',

            'end_time.required' => 'La hora de cierre es requerida.',
            'end_time.date_format:H:i' => 'La hora de cierre debe ser tipo 00:00.',

            'device_use.required' => 'El dispositivo es requerido.',
            'device_use.string' => 'El dispositivo seleccionado debe ser tipo string',

        ];
    }

    /*----------
        INDEX
    ------------*/
    public function index(Request $request)
    {
        $boxes = Box::all();
        $boxesHistory = BoxHistory::all();
        return view('box.index', compact('boxes', 'boxesHistory'));
    }

    /*-----------
        CREATE
    -------------*/
    public function create(Request $request)
    {
        return view('box.create');
    }

    /*----------
        STORE
    ------------*/
    public function store(Request $request)
    {

        try{

            // ARRAY CON VALIDACIONES //
            $validate = [
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i',
                'device_use' => 'required|string',
                'status' => 'boolean'
            ];

            // TRANSFORMO LOS TIPOS DE DATOS TIME DE 00:00:00 A 00:00 //
            $request['start_time'] = substr($request['start_time'], 0, 5);
            $request['end_time'] = substr($request['end_time'], 0, 5);

            // TRANSFORMO EL STATUS DE ON A TRUE Y DE OFF A FALSE //
            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;

            // VALIDO LOS CAMPOS //
            $this -> validate($request, $validate, $this->messageProduct());

            // INSTANCIO UNA CLASE DEL MODELO BOX //
            $boxes = new Box();

            // PREPARO LA DATA //
            $boxes->user_id = $request->user()->id;
            $boxes->device_use = $request['device_use'];
            $boxes->status = $request['status'];
            $boxes->created_at = Carbon::now();
            $boxes->updated_at = Carbon::now();

            // INSERTO LOS DATOS EN LA BASE DE DATOS //
            $boxes->save();

            // INSTANCIO UNA CLASE DEL MODELO BOXHISTORY //
            $boxesHistory = new BoxHistory();

            // PREPARO LA DATA //
            $boxesHistory->box_id = $boxes->id;
            $boxesHistory->start_time = $request['start_time'];
            $boxesHistory->end_time = $request['end_time'];
            $boxesHistory->created_at = Carbon::now();
            $boxesHistory->updated_at = Carbon::now();

            // INSERTO LOS DATOS EN LA BASE DE DATOS //
            $boxesHistory->save();

            // RETORNO LA VISTA //
            return redirect('box');

        }catch(Exception $e){
            throw new Exception($e);
        }

    }

    /*---------
        SHOW
    -----------*/
    public function show(Request $request, Box $box)
    {
        return view('box.show', compact('box'));
    }

    /*---------
        EDIT
    -----------*/
    public function edit($id)
    {
        $box = Box::findOrFail($id);
        $boxesHistory = BoxHistory::where('box_id', '=', $box->id)->first();
        return view('box.edit', compact('box', 'boxesHistory'));
    }

    /*-----------
        UPDATE
    -------------*/
    public function update(Request $request, $id)
    {

        try{

            $validate = [
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i',
                'status' => 'boolean'
            ];

            $request['start_time'] = substr($request['start_time'], 0, 5);
            $request['end_time'] = substr($request['end_time'], 0, 5);
            (isset($request['status'])) ? $request['status'] = 1 : $request['status'] = 0;

            $this -> validate($request, $validate, $this->messageProduct());

            $request->except(['_token', '_method']);

            /*------------------------------------------------------------
                NOTA PARA DAURY: DB ES UNA LIBRERIA PARA HACER QUERIES,
                SIN NECESIDAD DE USAR EL MODELO
            --------------------------------------------------------------*/
            DB::table('boxes')->update([
                'user_id' => $request->user()->id,
                'device_use' => $request['device_use'],
                'status' => $request['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('boxes_history')->update([
                'box_id' => (int) $id,
                'start_time' => $request['start_time'],
                'end_time' => $request['end_time'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect('box');

        }catch(Exception $e){
            throw new Exception($e);
        }

    }

    /*------------
        DESTROY
    --------------*/
    public function destroy($id)
    {
        try{
            $boxes = Box::findOrFail($id);
            $boxes->delete();
            return redirect('box');
        }catch(Exception $e){
            throw new Exception($e);
        }
    }

}
