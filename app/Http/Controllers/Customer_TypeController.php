<?php

namespace App\Http\Controllers;

use App\CustomerType;
use App\Http\Requests\Customer_TypeStoreRequest;
use App\Http\Requests\Customer_TypeUpdateRequest;
use Illuminate\Http\Request;

class Customer_TypeController extends Controller
{

    public function index(Request $request)
    {
        $customerTypes = CustomerType::all();
        return view('customerType.index', compact('customerTypes'));
    }

    public function create(Request $request)
    {
        return view('customerType.create');
    }

    public function store(Customer_TypeStoreRequest $request)
    {
        $customerType = CustomerType::create($request->validated());
        $request->session()->flash('customerType.id', $customerType->id);
        return redirect()->route('customerType.index');
    }

    public function show(Request $request, Customer_Type $customerType)
    {
        return view('customerType.show', compact('customerType'));
    }

    public function edit(Request $request, Customer_Type $customerType)
    {
        return view('customerType.edit', compact('customerType'));
    }

    public function update(Customer_TypeUpdateRequest $request, Customer_Type $customerType)
    {
        $customerType->update($request->validated());
        $request->session()->flash('customerType.id', $customerType->id);
        return redirect()->route('customerType.index');
    }

    public function destroy(Request $request, Customer_Type $customerType)
    {
        $customerType->delete();
        return redirect()->route('customerType.index');
    }

}
