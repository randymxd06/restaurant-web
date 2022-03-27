<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeTypeStoreRequest;
use App\Http\Requests\EmployeeTypeUpdateRequest;
use App\Models\EmployeeType;
use Illuminate\Http\Request;

class EmployeeTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employeeTypes = EmployeeType::all();

        return view('employeeType.index', compact('employeeTypes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('employeeType.create');
    }

    /**
     * @param \App\Http\Requests\EmployeeTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeTypeStoreRequest $request)
    {
        $employeeType = EmployeeType::create($request->validated());

        $request->session()->flash('employeeType.id', $employeeType->id);

        return redirect()->route('employeeType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployeeType $employeeType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EmployeeType $employeeType)
    {
        return view('employeeType.show', compact('employeeType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployeeType $employeeType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, EmployeeType $employeeType)
    {
        return view('employeeType.edit', compact('employeeType'));
    }

    /**
     * @param \App\Http\Requests\EmployeeTypeUpdateRequest $request
     * @param \App\Models\EmployeeType $employeeType
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeTypeUpdateRequest $request, EmployeeType $employeeType)
    {
        $employeeType->update($request->validated());

        $request->session()->flash('employeeType.id', $employeeType->id);

        return redirect()->route('employeeType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployeeType $employeeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, EmployeeType $employeeType)
    {
        $employeeType->delete();

        return redirect()->route('employeeType.index');
    }
}
