<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeReservationStoreRequest;
use App\Http\Requests\TypeReservationUpdateRequest;
use App\Models\TypeReservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TypeReservationController extends Controller
{

    // Mensaje de error al mostrar
    public function messageProduct(){
        return [
            'name.required' => 'El nombre es requerido.',
            'name.string' => 'El nombre debe ser un texto.',

            'description.required' => 'La descripcion es requerida.',
            'description.string' => 'La descripcion debe ser un texto.'
        ];
    }

    /*----------
        INDEX
    ------------*/
    public function index()
    {
        $typeReservations = TypeReservation::all();
        return view('typeReservation.index', compact('typeReservations'));
    }

    public function create(Request $request)
    {
        return view('typeReservation.create');
    }

    /*----------
        STORE
    ------------*/
    public function store(Request $request)
    {

        try{

            $validate = [
                'name' => 'required|string',
                'description' => 'required|string',
            ];

            // HAGO LA VALIDACION DEL STATUS, PARA ENVIARLA COMO TRUE O FALSE //
            ($request['status'] == 'on') ? $request['status'] = 1 : $request['status'] = 0;

            // Realizar la validacion de los datos
            $this -> validate($request, $validate, $this->messageProduct());

            // ESTE ES EL OBJETO CON LA INFORMACION QUE SE VA A GUARDAR //
            $jsonTypeReservation = [
                'name' => (int) $request['people_capacity'],
                'description' => ucfirst(strtolower($request['description'])),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            $typereservations = TypeReservation::insert($jsonTypeReservation);

            return redirect('typeReservation');

        }catch(\Exception $e){

            throw new \Exception($e);

        }

    }

    public function show(Request $request, TypeReservation $typeReservation)
    {
        return view('typeReservation.show', compact('typeReservation'));
    }

    public function edit(Request $request, TypeReservation $typeReservation)
    {
        return view('typeReservation.edit', compact('typeReservation'));
    }

    /*-----------
        UPDATE
    -------------*/
    public function update(Request $request, $id)
    {

        try{

            $validate = [
                'name' => 'required|string',
                'description' => 'required|string',
            ];

            $request->except(['_token', '_method']);

            // HAGO LA VALIDACION DEL STATUS, PARA ENVIARLA COMO TRUE O FALSE //
            ($request['status'] == 'on') ? $request['status'] = 1 : $request['status'] = 0;

            // Realizar la validacion de los datos
            $this -> validate($request, $validate, $this->messageProduct());

            // ESTE ES EL OBJETO CON LA INFORMACION QUE SE VA A GUARDAR //
            $jsonTypeReservation = [
                'name' => (int) $request['people_capacity'],
                'description' => ucfirst(strtolower($request['description'])),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            TypeReservation::where('id', '=', $id)->update($jsonTypeReservation);

            return redirect('typeReservation');

        }catch(\Exception $e){

            throw new \Exception($e);

        }

    }

    /*------------
        DESTROY
    --------------*/
    public function destroy($id)
    {
        try{
            $typeReservation = TypeReservation::findOrFail($id);
            $typeReservation->delete();
            return redirect('typeReservation');
        }catch(Exception $e){
            throw new Exception($e);
        }
    }

}
