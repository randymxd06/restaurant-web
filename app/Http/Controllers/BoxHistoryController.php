<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoxHistoryStoreRequest;
use App\Http\Requests\BoxHistoryUpdateRequest;
use App\Models\BoxHistory;
use Illuminate\Http\Request;

class BoxHistoryController extends Controller
{

    public function index(Request $request)
    {
        $boxHistories = BoxHistory::all();
        return view('boxHistory.index', compact('boxHistories'));
    }

    public function create(Request $request)
    {
        return view('boxHistory.create');
    }

    public function store(BoxHistoryStoreRequest $request)
    {
        $boxHistory = BoxHistory::create($request->validated());

        $request->session()->flash('boxHistory.id', $boxHistory->id);

        return redirect()->route('boxHistory.index');
    }

    public function show(Request $request, BoxHistory $boxHistory)
    {
        return view('boxHistory.show', compact('boxHistory'));
    }

    public function edit(Request $request, BoxHistory $boxHistory)
    {
        return view('boxHistory.edit', compact('boxHistory'));
    }

    public function update(BoxHistoryUpdateRequest $request, BoxHistory $boxHistory)
    {
        $boxHistory->update($request->validated());

        $request->session()->flash('boxHistory.id', $boxHistory->id);

        return redirect()->route('boxHistory.index');
    }

    public function destroy(Request $request, BoxHistory $boxHistory)
    {
        $boxHistory->delete();

        return redirect()->route('boxHistory.index');
    }

}
