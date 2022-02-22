<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntityStoreRequest;
use App\Http\Requests\EntityUpdateRequest;
use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{

    public function index(Request $request)
    {
        $entities = Entity::all();
        return view('entity.index', compact('entities'));
    }

    public function create(Request $request)
    {
        return view('entity.create');
    }

    public function store(EntityStoreRequest $request)
    {
        $entity = Entity::create($request->validated());
        $request->session()->flash('entity.id', $entity->id);
        return redirect()->route('entity.index');
    }

    public function show(Request $request, Entity $entity)
    {
        return view('entity.show', compact('entity'));
    }

    public function edit(Request $request, Entity $entity)
    {
        return view('entity.edit', compact('entity'));
    }

    public function update(EntityUpdateRequest $request, Entity $entity)
    {
        $entity->update($request->validated());
        $request->session()->flash('entity.id', $entity->id);
        return redirect()->route('entity.index');
    }

    public function destroy(Request $request, Entity $entity)
    {
        $entity->delete();
        return redirect()->route('entity.index');
    }

}
