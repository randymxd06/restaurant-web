<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderStoreRequest;
use App\Http\Requests\ProviderUpdateRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $providers = Provider::all();

        return view('provider.index', compact('providers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('provider.create');
    }

    /**
     * @param \App\Http\Requests\ProviderStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderStoreRequest $request)
    {
        $provider = Provider::create($request->validated());

        $request->session()->flash('provider.id', $provider->id);

        return redirect()->route('provider.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Provider $provider)
    {
        return view('provider.show', compact('provider'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Provider $provider)
    {
        return view('provider.edit', compact('provider'));
    }

    /**
     * @param \App\Http\Requests\ProviderUpdateRequest $request
     * @param \App\Models\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderUpdateRequest $request, Provider $provider)
    {
        $provider->update($request->validated());

        $request->session()->flash('provider.id', $provider->id);

        return redirect()->route('provider.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Provider $provider)
    {
        $provider->delete();

        return redirect()->route('provider.index');
    }
}
