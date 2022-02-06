<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportesStoreRequest;
use App\Http\Requests\ReportesUpdateRequest;
use App\Reporte;
use Illuminate\Http\Request;

class ReportesController extends Controller
{

    public function index(Request $request)
    {
        return view('reporte.index');
    }

    public function create(Request $request)
    {
        return view('reporte.create');
    }

    public function store(ReportesStoreRequest $request)
    {
        $reporte = Reporte::create($request->validated());

        $request->session()->flash('reporte.id', $reporte->id);

        return redirect()->route('reporte.index');
    }

    public function show(Request $request, Reporte $reporte)
    {
        return view('reporte.show', compact('reporte'));
    }

    public function edit(Request $request, Reporte $reporte)
    {
        return view('reporte.edit', compact('reporte'));
    }

    public function update(ReportesUpdateRequest $request, Reporte $reporte)
    {
        $reporte->update($request->validated());

        $request->session()->flash('reporte.id', $reporte->id);

        return redirect()->route('reporte.index');
    }

    public function destroy(Request $request, Reporte $reporte)
    {
        $reporte->delete();

        return redirect()->route('reporte.index');
    }

}
