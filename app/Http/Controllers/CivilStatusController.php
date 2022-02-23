<?php

namespace App\Http\Controllers;

use App\Http\Requests\CivilStatusStoreRequest;
use App\Http\Requests\CivilStatusUpdateRequest;
use App\Models\CivilStatus;
use Illuminate\Http\Request;

class CivilStatusController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $civilStatuses = CivilStatus::all();

        return view('civilStatus.index', compact('civilStatuses'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('civilStatus.create');
    }

    /**
     * @param \App\Http\Requests\CivilStatusStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CivilStatusStoreRequest $request)
    {
        $civilStatus = CivilStatus::create($request->validated());

        $request->session()->flash('civilStatus.id', $civilStatus->id);

        return redirect()->route('civilStatus.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CivilStatus $civilStatus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CivilStatus $civilStatus)
    {
        return view('civilStatus.show', compact('civilStatus'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CivilStatus $civilStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CivilStatus $civilStatus)
    {
        return view('civilStatus.edit', compact('civilStatus'));
    }

    /**
     * @param \App\Http\Requests\CivilStatusUpdateRequest $request
     * @param \App\Models\CivilStatus $civilStatus
     * @return \Illuminate\Http\Response
     */
    public function update(CivilStatusUpdateRequest $request, CivilStatus $civilStatus)
    {
        $civilStatus->update($request->validated());

        $request->session()->flash('civilStatus.id', $civilStatus->id);

        return redirect()->route('civilStatus.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CivilStatus $civilStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CivilStatus $civilStatus)
    {
        $civilStatus->delete();

        return redirect()->route('civilStatus.index');
    }
}
