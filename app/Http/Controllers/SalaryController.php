<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryStoreRequest;
use App\Http\Requests\SalaryUpdateRequest;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $salaries = Salary::all();

        return view('salary.index', compact('salaries'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('salary.create');
    }

    /**
     * @param \App\Http\Requests\SalaryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaryStoreRequest $request)
    {
        $salary = Salary::create($request->validated());

        $request->session()->flash('salary.id', $salary->id);

        return redirect()->route('salary.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salary $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Salary $salary)
    {
        return view('salary.show', compact('salary'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salary $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Salary $salary)
    {
        return view('salary.edit', compact('salary'));
    }

    /**
     * @param \App\Http\Requests\SalaryUpdateRequest $request
     * @param \App\Models\Salary $salary
     * @return \Illuminate\Http\Response
     */
    public function update(SalaryUpdateRequest $request, Salary $salary)
    {
        $salary->update($request->validated());

        $request->session()->flash('salary.id', $salary->id);

        return redirect()->route('salary.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salary $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Salary $salary)
    {
        $salary->delete();

        return redirect()->route('salary.index');
    }
}
