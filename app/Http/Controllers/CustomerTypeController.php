<?php

namespace App\Http\Controllers;

use App\CostumerType;
use App\Http\Requests\CostumerTypeStoreRequest;
use App\Http\Requests\CostumerTypeUpdateRequest;
use App\Models\CustomerType;
use Illuminate\Http\Request;

class CustomerTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customerTypes = CustomerType::all();

        return view('costumerType.index', compact('costumerTypes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('costumerType.create');
    }

    /**
     * @param \App\Http\Requests\CostumerTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostumerTypeStoreRequest $request)
    {
        $costumerType = CustomerType::create($request->validated());

        $request->session()->flash('costumerType.id', $costumerType->id);

        return redirect()->route('costumerType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\costumerType $costumerType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CostumerType $costumerType)
    {
        return view('costumerType.show', compact('costumerType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\costumerType $costumerType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CostumerType $costumerType)
    {
        return view('costumerType.edit', compact('costumerType'));
    }

    /**
     * @param \App\Http\Requests\CostumerTypeUpdateRequest $request
     * @param \App\costumerType $costumerType
     * @return \Illuminate\Http\Response
     */
    public function update(CostumerTypeUpdateRequest $request, CostumerType $costumerType)
    {
        $costumerType->update($request->validated());

        $request->session()->flash('costumerType.id', $costumerType->id);

        return redirect()->route('costumerType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\costumerType $costumerType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CostumerType $costumerType)
    {
        $costumerType->delete();

        return redirect()->route('costumerType.index');
    }
}
