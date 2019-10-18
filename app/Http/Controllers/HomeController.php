<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use Illuminate\Http\Request;
use App\Request as Req;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $requests = Req::all();
        return view('home', compact('requests'));
    }

    public function create()
    {
        $req = null;
        $activities = Activity::pluck('name', 'id')->prepend('Seleccionar', -1);
        $users = User::pluck('name', 'id')->prepend('Seleccionar', -1);
        return view('requests.create', compact( 'req', 'activities', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'activity_id' => 'required',
            'user_id' => 'required',
            'items' => 'required|array|min:1',
        ]);

        $req = Req::create($request->all());
        $req->items()->attach($request->items);

        return redirect()->route('home')->with('success', 'Solicitud creada correctamente!!');
    }

    public function edit(Req $req)
    {
        $items = Item::pluck('name', 'id');
        return view('requests.create', compact('req', 'items'));
    }

    public function update(Request $request, Activity $req)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        return redirect()->route('home')->with('success', 'Solicitud editado correctamente');
    }
}
