<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeReservationStoreRequest;
use App\Http\Requests\TypeReservationUpdateRequest;
use App\Models\TypeReservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

            // Realizar la validacion de los datos
            $this -> validate($request, $validate, $this->messageProduct());

            // ESTE ES EL OBJETO CON LA INFORMACION QUE SE VA A GUARDAR //
            $jsonTypeReservation = [
                'name' => $request['name'],
                'description' => ucfirst(strtolower($request['description'])),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            $typereservations = TypeReservation::insert($jsonTypeReservation);

            Alert::success('El tipo reservacion fue creado correctamente!');

            return redirect('type-reservation');

        }catch(Exception $e){

            throw new Exception($e);

        }

    }

    public function show(Request $request, $id)
    {
        return view('typeReservation.show', compact('typeReservation'));
    }

    public function edit(Request $request, $id)
    {

        $typeReservation = TypeReservation::findOrFail($id);

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

            // Realizar la validacion de los datos
            $this -> validate($request, $validate, $this->messageProduct());

            // ESTE ES EL OBJETO CON LA INFORMACION QUE SE VA A GUARDAR //
            $jsonTypeReservation = [
                'name' => $request['name'],
                'description' => ucfirst(strtolower($request['description'])),
                'updated_at' => Carbon::now()
            ];

            TypeReservation::where('id', '=', $id)->update($jsonTypeReservation);

            Alert::success('Los datos del tipo reservacion fueron actualizados correctamente!');

            return redirect('type-reservation');

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
            $typeReservation = TypeReservation::findOrFail($id);
            $typeReservation->delete();
            return redirect('type-reservation');
        }catch(Exception $e){
            throw new Exception($e);
        }
    }

}
