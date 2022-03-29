<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectorStoreRequest;
use App\Http\Requests\SectorUpdateRequest;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sectors = Sector::all();

        return view('sector.index', compact('sectors'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('sector.create');
    }

    /**
     * @param \App\Http\Requests\SectorStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectorStoreRequest $request)
    {
        $sector = Sector::create($request->validated());

        $request->session()->flash('sector.id', $sector->id);

        return redirect()->route('sector.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sector $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sector $sector)
    {
        return view('sector.show', compact('sector'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sector $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sector $sector)
    {
        return view('sector.edit', compact('sector'));
    }

    /**
     * @param \App\Http\Requests\SectorUpdateRequest $request
     * @param \App\Models\Sector $sector
     * @return \Illuminate\Http\Response
     */
    public function update(SectorUpdateRequest $request, Sector $sector)
    {
        $sector->update($request->validated());

        $request->session()->flash('sector.id', $sector->id);

        return redirect()->route('sector.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sector $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sector $sector)
    {
        $sector->delete();

        return redirect()->route('sector.index');
    }
}
