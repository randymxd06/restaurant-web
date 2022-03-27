<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseTypeStoreRequest;
use App\Http\Requests\WarehouseTypeUpdateRequest;
use App\Models\WarehouseType;
use Illuminate\Http\Request;

class WarehouseTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $warehouseTypes = WarehouseType::all();

        return view('warehouseType.index', compact('warehouseTypes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('warehouseType.create');
    }

    /**
     * @param \App\Http\Requests\WarehouseTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarehouseTypeStoreRequest $request)
    {
        $warehouseType = WarehouseType::create($request->validated());

        $request->session()->flash('warehouseType.id', $warehouseType->id);

        return redirect()->route('warehouseType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WarehouseType $warehouseType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, WarehouseType $warehouseType)
    {
        return view('warehouseType.show', compact('warehouseType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WarehouseType $warehouseType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, WarehouseType $warehouseType)
    {
        return view('warehouseType.edit', compact('warehouseType'));
    }

    /**
     * @param \App\Http\Requests\WarehouseTypeUpdateRequest $request
     * @param \App\Models\WarehouseType $warehouseType
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseTypeUpdateRequest $request, WarehouseType $warehouseType)
    {
        $warehouseType->update($request->validated());

        $request->session()->flash('warehouseType.id', $warehouseType->id);

        return redirect()->route('warehouseType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WarehouseType $warehouseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, WarehouseType $warehouseType)
    {
        $warehouseType->delete();

        return redirect()->route('warehouseType.index');
    }
}
