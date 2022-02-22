<?php

namespace App\Http\Controllers;

use App\Http\Requests\NationalityStoreRequest;
use App\Http\Requests\NationalityUpdateRequest;
use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{

    public function index(Request $request)
    {
        $nationalities = Nationality::all();
        return view('nationality.index', compact('nationalities'));
    }

    public function create(Request $request)
    {
        return view('nationality.create');
    }

    public function store(NationalityStoreRequest $request)
    {
        $nationality = Nationality::create($request->validated());
        $request->session()->flash('nationality.id', $nationality->id);
        return redirect()->route('nationality.index');
    }

    public function show(Request $request, Nationality $nationality)
    {
        return view('nationality.show', compact('nationality'));
    }

    public function edit(Request $request, Nationality $nationality)
    {
        return view('nationality.edit', compact('nationality'));
    }

    public function update(NationalityUpdateRequest $request, Nationality $nationality)
    {
        $nationality->update($request->validated());
        $request->session()->flash('nationality.id', $nationality->id);
        return redirect()->route('nationality.index');
    }

    public function destroy(Request $request, Nationality $nationality)
    {
        $nationality->delete();
        return redirect()->route('nationality.index');
    }

}
