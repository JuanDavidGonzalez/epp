<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Item;
use App\Process;
use App\Risk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $risks = Risk::pluck('description', 'id');
        $processes = Process::pluck('name', 'id')->prepend('Seleccionar', -1);

        return view('activities.create', compact( 'activity', 'items', 'risks', 'processes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => [
                'required',
                Rule::unique('activities'),
            ],
            'items' => 'required|array|min:1',
            'risks' => 'required|array|min:1',
            'process_id' => 'required|not_in:-1',
        ]);

        $activity = Activity::create($request->all());
        $activity->items()->attach($request->items);
        $activity->risks()->attach($request->risks);

        return redirect()->route('activity.index')->with('success', 'Actividad creada correctamente!!');
    }

    public function edit(Activity $activity)
    {
        $items = Item::pluck('name', 'id');
        $risks = Risk::pluck('description', 'id');
        $processes = Process::pluck('name', 'id')->prepend('Seleccionar', -1);

        return view('activities.create', compact('activity', 'items', 'risks', 'processes'));
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'name' => 'required',
            'code' => [
                'required',
                Rule::unique('activities')->ignore($activity)
            ],
            'items' => 'required|array|min:1',
            'risks' => 'required|array|min:1',
            'process_id' => 'required|not_in:-1',
        ]);

        $activity->update($request->all());
        $activity->items()->sync($request->items);
        $activity->risks()->sync($request->risks);
        return redirect()->route('activity.index')->with('success', 'Actividad editada correctamente');
    }

    public function list(Activity $activity)
    {
        $items =  $activity->items;
        return $items;
    }

    public function risks(Activity $activity)
    {
        $risks =  $activity->risks;
        return $risks;
    }

    public function listActivities(Process $process)
    {
        $activities = $process->activities->map(function ($value) {
            return collect($value->toArray())->only(['id', 'name'])->all();
        })->prepend(['id'=>-1, 'name'=>'Seleccionar']);;
        return $activities;
    }
}
