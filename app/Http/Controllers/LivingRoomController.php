<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivingRoomStoreRequest;
use App\Http\Requests\LivingRoomUpdateRequest;
use App\Models\LivingRoom;
use Illuminate\Http\Request;

class LivingRoomController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $livingRooms = LivingRoom::all();

        return view('livingRoom.index', compact('livingRooms'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('livingRoom.create');
    }

    /**
     * @param \App\Http\Requests\LivingRoomStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LivingRoomStoreRequest $request)
    {
        $livingRoom = LivingRoom::create($request->validated());

        $request->session()->flash('livingRoom.id', $livingRoom->id);

        return redirect()->route('livingRoom.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LivingRoom $livingRoom
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LivingRoom $livingRoom)
    {
        return view('livingRoom.show', compact('livingRoom'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LivingRoom $livingRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LivingRoom $livingRoom)
    {
        return view('livingRoom.edit', compact('livingRoom'));
    }

    /**
     * @param \App\Http\Requests\LivingRoomUpdateRequest $request
     * @param \App\Models\LivingRoom $livingRoom
     * @return \Illuminate\Http\Response
     */
    public function update(LivingRoomUpdateRequest $request, LivingRoom $livingRoom)
    {
        $livingRoom->update($request->validated());

        $request->session()->flash('livingRoom.id', $livingRoom->id);

        return redirect()->route('livingRoom.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LivingRoom $livingRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, LivingRoom $livingRoom)
    {
        $livingRoom->delete();

        return redirect()->route('livingRoom.index');
    }
}
