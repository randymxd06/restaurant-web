<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{

    public function messageProduct(){
        return [

            'start_time.required' => 'La hora de inicio es requerida.',
            'start_time.time' => 'La hora de inicio debe ser tipo 00:00:00.00.',

            'end_time.required' => 'La hora de cierre es requerida.',
            'end_time.time' => 'La hora de cierre debe ser tipo 00:00:00.00.',

        ];
    }

    public function index(Request $request)
    {
        $boxes = Box::all();
        return view('box.index', compact('boxes'));
    }

    public function create(Request $request)
    {
        return view('box.create');
    }

    public function store(Request $request)
    {

        try{

            $validate = [
                'start_time' => 'required|time',
                'end_time' => 'required|time',
                'status' => 'boolean'
            ];

            $this -> validate($request, $validate, $this->messageProduct());

            ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;

            $jsonBoxes = [
                'start_time' => $request['start_time'],
                'end_time' => $request['end_time'],
                'status' => $request['status'],
            ];

            Box::insert($jsonBoxes);

            return redirect('box');

        }catch(Exception $e){
            throw new Exception($e);
        }

    }

    public function show(Request $request, Box $box)
    {
        return view('box.show', compact('box'));
    }

    public function edit(Request $request, Box $box)
    {
        return view('box.edit', compact('box'));
    }

    public function update(Request $request, $id)
    {

        try{

            $validate = [
                'start_time' => 'required|time',
                'end_time' => 'required|time',
                'status' => 'boolean'
            ];

            $this -> validate($request, $validate, $this->messageProduct());

            (isset($request['status'])) ? $request['status'] = 1 : $request['status'] = 0;

            $request->except(['_token', '_method']);

            $jsonBoxes = [
                'start_time' => $request['start_time'],
                'end_time' => $request['end_time'],
                'status' => $request['status'],
            ];

            Box::where('id', '=', $id)->update($jsonBoxes);

            return redirect('box');

        }catch(Exception $e){
            throw new Exception($e);
        }

    }

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
