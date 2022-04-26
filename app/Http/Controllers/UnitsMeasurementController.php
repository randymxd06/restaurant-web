<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitsMeasurementStoreRequest;
use App\Http\Requests\UnitsMeasurementUpdateRequest;
use App\Models\UnitsMeasurement;
use Illuminate\Http\Request;

class UnitsMeasurementController extends Controller
{

    public function index(Request $request)
    {
        $unitsMeasurements = UnitsMeasurement::all();

        return view('unitsMeasurement.index', compact('unitsMeasurements'));
    }


    public function create(Request $request)
    {
        return view('unitsMeasurement.create');
    }

    /**
     * @param \App\Http\Requests\UnitsMeasurementStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitsMeasurementStoreRequest $request)
    {
        $unitsMeasurement = UnitsMeasurement::create($request->validated());

        $request->session()->flash('unitsMeasurement.id', $unitsMeasurement->id);

        return redirect()->route('unitsMeasurement.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UnitsMeasurement $unitsMeasurement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UnitsMeasurement $unitsMeasurement)
    {
        return view('unitsMeasurement.show', compact('unitsMeasurement'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UnitsMeasurement $unitsMeasurement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UnitsMeasurement $unitsMeasurement)
    {
        return view('unitsMeasurement.edit', compact('unitsMeasurement'));
    }

    /**
     * @param \App\Http\Requests\UnitsMeasurementUpdateRequest $request
     * @param \App\Models\UnitsMeasurement $unitsMeasurement
     * @return \Illuminate\Http\Response
     */
    public function update(UnitsMeasurementUpdateRequest $request, UnitsMeasurement $unitsMeasurement)
    {
        $unitsMeasurement->update($request->validated());

        $request->session()->flash('unitsMeasurement.id', $unitsMeasurement->id);

        return redirect()->route('unitsMeasurement.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UnitsMeasurement $unitsMeasurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UnitsMeasurement $unitsMeasurement)
    {
        $unitsMeasurement->delete();

        return redirect()->route('unitsMeasurement.index');
    }
}
