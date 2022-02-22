<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoxStoreRequest;
use App\Http\Requests\BoxUpdateRequest;
use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{

    public function index(Request $request)
    {
        $boxes = Box::all();
        return view('box.index', compact('boxes'));
    }

    public function create(Request $request)
    {
        return view('box.create');
    }

    public function store(BoxStoreRequest $request)
    {
        $box = Box::create($request->validated());
        $request->session()->flash('box.id', $box->id);
        return redirect()->route('box.index');
    }

    public function show(Request $request, Box $box)
    {
        return view('box.show', compact('box'));
    }

    public function edit(Request $request, Box $box)
    {
        return view('box.edit', compact('box'));
    }

    public function update(BoxUpdateRequest $request, Box $box)
    {
        $box->update($request->validated());
        $request->session()->flash('box.id', $box->id);
        return redirect()->route('box.index');
    }

    public function destroy(Request $request, Box $box)
    {
        $box->delete();
        return redirect()->route('box.index');
    }

}
