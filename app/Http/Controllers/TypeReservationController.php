<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeReservationStoreRequest;
use App\Http\Requests\TypeReservationUpdateRequest;
use App\Models\TypeReservation;
use Illuminate\Http\Request;

class TypeReservationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $typeReservations = TypeReservation::all();

        return view('typeReservation.index', compact('typeReservations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('typeReservation.create');
    }

    /**
     * @param \App\Http\Requests\TypeReservationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeReservationStoreRequest $request)
    {
        $typeReservation = TypeReservation::create($request->validated());

        $request->session()->flash('typeReservation.id', $typeReservation->id);

        return redirect()->route('typeReservation.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeReservation $typeReservation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TypeReservation $typeReservation)
    {
        return view('typeReservation.show', compact('typeReservation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeReservation $typeReservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TypeReservation $typeReservation)
    {
        return view('typeReservation.edit', compact('typeReservation'));
    }

    /**
     * @param \App\Http\Requests\TypeReservationUpdateRequest $request
     * @param \App\Models\TypeReservation $typeReservation
     * @return \Illuminate\Http\Response
     */
    public function update(TypeReservationUpdateRequest $request, TypeReservation $typeReservation)
    {
        $typeReservation->update($request->validated());

        $request->session()->flash('typeReservation.id', $typeReservation->id);

        return redirect()->route('typeReservation.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeReservation $typeReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TypeReservation $typeReservation)
    {
        $typeReservation->delete();

        return redirect()->route('typeReservation.index');
    }
}
