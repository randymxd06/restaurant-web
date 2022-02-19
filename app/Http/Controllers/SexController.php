<?php

namespace App\Http\Controllers;

use App\Http\Requests\SexStoreRequest;
use App\Http\Requests\SexUpdateRequest;
use App\Models\Sex;
use Illuminate\Http\Request;

class SexController extends Controller
{

    public function index(Request $request)
    {
        $sexes = Sex::all();
        return view('sex.index', compact('sexes'));
    }

    public function create(Request $request)
    {
        return view('sex.create');
    }

    public function store(SexStoreRequest $request)
    {
        $sex = Sex::create($request->validated());
        $request->session()->flash('sex.id', $sex->id);
        return redirect()->route('sex.index');
    }

    public function show(Request $request, Sex $sex)
    {
        return view('sex.show', compact('sex'));
    }

    public function edit(Request $request, Sex $sex)
    {
        return view('sex.edit', compact('sex'));
    }

    public function update(SexUpdateRequest $request, Sex $sex)
    {
        $sex->update($request->validated());
        $request->session()->flash('sex.id', $sex->id);
        return redirect()->route('sex.index');
    }

    public function destroy(Request $request, Sex $sex)
    {
        $sex->delete();
        return redirect()->route('sex.index');
    }

}
