<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Item;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        $activity = null;
        $items = Item::pluck('name', 'id');
        return view('activities.create', compact( 'activity', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'items' => 'required|array|min:1',
        ]);

        $activity = Activity::create($request->all());
        $activity->items()->attach($request->items);

        return redirect()->route('activity.index')->with('success', 'Actividad creada correctamente!!');
    }

    public function edit(Activity $activity)
    {
        $items = Item::pluck('name', 'id');
        return view('activities.create', compact('activity', 'items'));
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'items' => 'required|array|min:1',
        ]);

        $activity->update($request->all());
        $activity->items()->sync($request->items);
        return redirect()->route('activity.index')->with('success', 'Actividad editado correctamente');
    }

    public function list(Activity $activity)
    {
        $items =  $activity->items;
        return $items;
    }
}
