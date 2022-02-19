<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function create(Request $request)
    {
        return view('customer.create');
    }

    public function store(CustomerStoreRequest $request)
    {
        $customer = Customer::create($request->validated());
        $request->session()->flash('customer.id', $customer->id);
        return redirect()->route('customer.index');
    }

    public function show(Request $request, Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(Request $request, Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        $request->session()->flash('customer.id', $customer->id);
        return redirect()->route('customer.index');
    }

    public function destroy(Request $request, Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index');
    }

}
