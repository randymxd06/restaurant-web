<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menus = Menu::all();

        return view('menu.index', compact('menus'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('menu.create');
    }

    /**
     * @param \App\Http\Requests\MenuStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $menu = Menu::create($request->validated());

        $request->session()->flash('menu.id', $menu->id);

        return redirect()->route('menu.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * @param \App\Http\Requests\MenuUpdateRequest $request
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        $menu->update($request->validated());

        $request->session()->flash('menu.id', $menu->id);

        return redirect()->route('menu.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index');
    }
}
