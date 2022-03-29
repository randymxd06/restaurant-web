<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkAreaStoreRequest;
use App\Http\Requests\WorkAreaUpdateRequest;
use App\Models\WorkArea;
use Illuminate\Http\Request;

class WorkAreaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $workAreas = WorkArea::all();

        return view('workArea.index', compact('workAreas'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('workArea.create');
    }

    /**
     * @param \App\Http\Requests\WorkAreaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkAreaStoreRequest $request)
    {
        $workArea = WorkArea::create($request->validated());

        $request->session()->flash('workArea.id', $workArea->id);

        return redirect()->route('workArea.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkArea $workArea
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, WorkArea $workArea)
    {
        return view('workArea.show', compact('workArea'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkArea $workArea
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, WorkArea $workArea)
    {
        return view('workArea.edit', compact('workArea'));
    }

    /**
     * @param \App\Http\Requests\WorkAreaUpdateRequest $request
     * @param \App\Models\WorkArea $workArea
     * @return \Illuminate\Http\Response
     */
    public function update(WorkAreaUpdateRequest $request, WorkArea $workArea)
    {
        $workArea->update($request->validated());

        $request->session()->flash('workArea.id', $workArea->id);

        return redirect()->route('workArea.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkArea $workArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, WorkArea $workArea)
    {
        $workArea->delete();

        return redirect()->route('workArea.index');
    }
}
