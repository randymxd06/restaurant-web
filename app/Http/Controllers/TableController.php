<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableStoreRequest;
use App\Http\Requests\TableUpdateRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{

    public function index(Request $request)
    {
        $tables = Table::all();
        return view('table.index', compact('tables'));
    }

    public function create(Request $request)
    {
        return view('table.create');
    }

    public function store(Request $request)
    {
        $table = Table::create($request->all());
        $request->session()->flash('table.id', $table->id);
        return redirect()->route('table.index');
    }

    public function show(Request $request, Table $table)
    {
        return view('table.show', compact('table'));
    }

    public function edit(Request $request, Table $table)
    {
        return view('table.edit', compact('table'));
    }

    public function update(TableUpdateRequest $request, Table $table)
    {
        $table->update($request->validated());
        $request->session()->flash('table.id', $table->id);
        return redirect()->route('table.index');
    }

    public function destroy(Request $request, Table $table)
    {
        $table->delete();
        return redirect()->route('table.index');
    }

}
