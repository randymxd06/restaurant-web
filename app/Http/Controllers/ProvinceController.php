<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinceStoreRequest;
use App\Http\Requests\ProvinceUpdateRequest;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provinces = Province::all();

        return view('province.index', compact('provinces'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('province.create');
    }

    /**
     * @param \App\Http\Requests\ProvinceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceStoreRequest $request)
    {
        $province = Province::create($request->validated());

        $request->session()->flash('province.id', $province->id);

        return redirect()->route('province.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Province $province)
    {
        return view('province.show', compact('province'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Province $province)
    {
        return view('province.edit', compact('province'));
    }

    /**
     * @param \App\Http\Requests\ProvinceUpdateRequest $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceUpdateRequest $request, Province $province)
    {
        $province->update($request->validated());

        $request->session()->flash('province.id', $province->id);

        return redirect()->route('province.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Province $province)
    {
        $province->delete();

        return redirect()->route('province.index');
    }
}
