<?php

namespace App\Http\Controllers;

use App\Http\Requests\Living_RoomStoreRequest;
use App\Http\Requests\Living_RoomUpdateRequest;
use App\LivingRoom;
use Illuminate\Http\Request;

class Living_RoomController extends Controller
{

    public function index(Request $request)
    {
        $livingRooms = LivingRoom::all();
        return view('livingRoom.index', compact('livingRooms'));
    }

    public function create(Request $request)
    {
        return view('livingRoom.create');
    }

    public function store(Living_RoomStoreRequest $request)
    {
        $livingRoom = LivingRoom::create($request->validated());
        $request->session()->flash('livingRoom.id', $livingRoom->id);
        return redirect()->route('livingRoom.index');
    }

    public function show(Request $request, Living_Room $livingRoom)
    {
        return view('livingRoom.show', compact('livingRoom'));
    }

    public function edit(Request $request, Living_Room $livingRoom)
    {
        return view('livingRoom.edit', compact('livingRoom'));
    }

    public function update(Living_RoomUpdateRequest $request, Living_Room $livingRoom)
    {
        $livingRoom->update($request->validated());
        $request->session()->flash('livingRoom.id', $livingRoom->id);
        return redirect()->route('livingRoom.index');
    }

    public function destroy(Request $request, Living_Room $livingRoom)
    {
        $livingRoom->delete();
        return redirect()->route('livingRoom.index');
    }

}
