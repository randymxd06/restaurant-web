<?php

namespace App\Http\Controllers;

use App\CivilStatu;
use App\Http\Requests\Civil_StatuStoreRequest;
use App\Http\Requests\Civil_StatuUpdateRequest;
use Illuminate\Http\Request;

class Civil_StatuController extends Controller
{

    public function index(Request $request)
    {
        $civilStatus = CivilStatu::all();
        return view('civilStatu.index', compact('civilStatus'));
    }

    public function create(Request $request)
    {
        return view('civilStatu.create');
    }

    public function store(Civil_StatuStoreRequest $request)
    {
        $civilStatu = CivilStatu::create($request->validated());
        $request->session()->flash('civilStatu.id', $civilStatu->id);
        return redirect()->route('civilStatu.index');
    }

    public function show(Request $request, Civil_Statu $civilStatu)
    {
        return view('civilStatu.show', compact('civilStatu'));
    }

    public function edit(Request $request, Civil_Statu $civilStatu)
    {
        return view('civilStatu.edit', compact('civilStatu'));
    }

    public function update(Civil_StatuUpdateRequest $request, Civil_Statu $civilStatu)
    {
        $civilStatu->update($request->validated());
        $request->session()->flash('civilStatu.id', $civilStatu->id);
        return redirect()->route('civilStatu.index');
    }

    public function destroy(Request $request, Civil_Statu $civilStatu)
    {
        $civilStatu->delete();
        return redirect()->route('civilStatu.index');
    }

}
