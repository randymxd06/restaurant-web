<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index(Request $request)
    {
        return view('menu.index');
    }

    public function create(Request $request)
    {
        return view('menu.create');
    }

    public function store(MenuStoreRequest $request)
    {
        $menu = Menu::create($request->validated());

        $request->session()->flash('menu.id', $menu->id);

        return redirect()->route('menu.index');
    }

    public function show(Request $request, Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }

    public function edit(Request $request, Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        $menu->update($request->validated());

        $request->session()->flash('menu.id', $menu->id);

        return redirect()->route('menu.index');
    }

    public function destroy(Request $request, Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index');
    }

}
