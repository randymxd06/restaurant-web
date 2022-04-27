<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitsMeasurementStoreRequest;
use App\Http\Requests\UnitsMeasurementUpdateRequest;
use App\Models\UnitsMeasurement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use function PHPUnit\Framework\throwException;

class UnitsMeasurementController extends Controller
{

    /*-------------
        MENSAJES
    ---------------*/
    public function message(){

        return [

            'name.required' => 'El nombre de la unidad de medida es requerida.',
            'name.string' => 'El nombre de la unidad de medida debe ser un texto.',

            'symbol.required' => 'El simbolo de la unidad de medida es requerida.',
            'symbol.string' => 'El simbolo de la unidad de medida debe ser un texto.',

            'description.required' => 'La descripción es requerida.',
            'description.string' => 'La descripcion de la unidad de medida debe ser un texto.',

        ];

    }

    /*----------
        INDEX
    ------------*/
    public function index()
    {
        $unitsMeasurements = UnitsMeasurement::all();
        return view('unitsMeasurement.index', compact('unitsMeasurements'));
    }

    /*-----------
        CREATE
    -------------*/
    public function create()
    {
        return view('unitsMeasurement.create');
    }

    /*----------
        STORE
    ------------*/
    public function store(Request $request)
    {

        try {

            $validate = [
                'name' =>[
                    'required',
                    'string',
                ],
                'symbol' => [
                    'required',
                    'string'
                ],
                'description' => [
                    'required',
                    'string'
                ],
            ];

            $this -> validate($request, $validate, $this->message());

            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            (empty($request['description'])) ? $request['description'] = $request['name'] : null;

            $data = request()->except('_token');
            $data['name'] = ucfirst(strtolower($data['name']));
            $data['symbol'] = ucfirst(strtolower($data['symbol']));
            $data['description'] = ucfirst(strtolower($data['description']));
            $data['created_at'] = Carbon::now();

            UnitsMeasurement::insert($data);

            Alert::success('La unidad de medida fue creada correctamente!');

            return redirect('units-measurement');

        }catch (Exception $e){

            DB::rollBack();

            throwException($e);

        }

    }

    public function show($id)
    {
        return view('unitsMeasurement.show');
    }

    /*---------
        EDIT
    -----------*/
    public function edit($id)
    {
        $unitsMeasurement = UnitsMeasurement::findOrFail($id);
        return view('unitsMeasurement.edit', compact(['unitsMeasurement']));
    }

    /*-----------
        UPDATE
    -------------*/
    public function update(Request $request, $id)
    {

        try {

            $validate = [
                'name' =>[
                    'required',
                    'string',
                ],
                'symbol' => [
                    'required',
                    'string'
                ],
                'description' => [
                    'required',
                    'string'
                ],
            ];

            $this -> validate($request, $validate, $this->message());

            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;
            (empty($request['description'])) ? $request['description'] = $request['name'] : null;

            $data = request()->except('_token', '_method');
            $data['name'] = ucfirst(strtolower($data['name']));
            $data['symbol'] = ucfirst(strtolower($data['symbol']));
            $data['description'] = ucfirst(strtolower($data['description']));
            $data['created_at'] = Carbon::now();

            UnitsMeasurement::where('id', '=', $id)->update($data);

            Alert::success('Los datos de la unidad de medida fueron actualizados correctamente!');

            return redirect('units-measurement');

        }catch (Exception $e){

            DB::rollBack();

            throwException($e);

        }

    }

    /*------------
        DESTROY
    --------------*/
    public function destroy($id)
    {

        try {

            $unitsMeasurement = UnitsMeasurement::findOrFail($id);

            $unitsMeasurement->delete();

            return redirect('units-measurement');

        }catch (Exception $e){

            DB::rollBack();

            throwException($e);

        }

    }

}
