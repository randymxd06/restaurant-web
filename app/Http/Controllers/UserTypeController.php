<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTypeStoreRequest;
use App\Http\Requests\UserTypeUpdateRequest;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userTypes = UserType::all();

        return view('userType.index', compact('userTypes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('userType.create');
    }

    /**
     * @param \App\Http\Requests\UserTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserTypeStoreRequest $request)
    {
        $userType = UserType::create($request->validated());

        $request->session()->flash('userType.id', $userType->id);

        return redirect()->route('userType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserType $userType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UserType $userType)
    {
        return view('userType.show', compact('userType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserType $userType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UserType $userType)
    {
        return view('userType.edit', compact('userType'));
    }

    /**
     * @param \App\Http\Requests\UserTypeUpdateRequest $request
     * @param \App\Models\UserType $userType
     * @return \Illuminate\Http\Response
     */
    public function update(UserTypeUpdateRequest $request, UserType $userType)
    {
        $userType->update($request->validated());

        $request->session()->flash('userType.id', $userType->id);

        return redirect()->route('userType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserType $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserType $userType)
    {
        $userType->delete();

        return redirect()->route('userType.index');
    }
}
