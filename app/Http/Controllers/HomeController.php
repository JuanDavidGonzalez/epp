<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Exports\RequestsExport;
use App\User;
use Illuminate\Http\Request;
use App\Request as Req;
use Maatwebsite\Excel\Facades\Excel;

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
        if(auth()->user()->hasRole('coordinator'))
            $requests = Req::all();
        else
            $requests = Req::where('user_id', auth()->user()->id)->get();

        return view('home', compact('requests'));
    }

    public function create()
    {
        $req = null;
        $activities = Activity::pluck('name', 'id')->prepend('Seleccionar', -1);

        if(auth()->user()->hasRole('coordinator'))
            $users = User::all()->pluck('nameP', 'id')->prepend('Seleccionar', -1);
        else
            $users = User::where('id', auth()->user()->id)->get()->pluck('nameP', 'id');

        return view('requests.create', compact( 'req', 'activities', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'activity_id' => 'required|not_in:-1',
            'user_id' => 'required|not_in:-1',
            'process_id' => 'required|not_in:-1',
            'items' => 'required|array|min:1',
        ]);

        $req = Req::create($request->all());
        $req->items()->attach($request->items);

        return redirect()->route('home')->with('success', 'Solicitud creada correctamente!!');
    }

    public function edit($id)
    {
        $activities = Activity::pluck('name', 'id')->prepend('Seleccionar', -1);
        if(auth()->user()->hasRole('coordinator'))
            $users = User::all()->pluck('nameP', 'id')->prepend('Seleccionar', -1);
        else
            $users = User::where('id', auth()->user()->id)->get()->pluck('nameP', 'id');
        $req = Req::findOrFail($id);
        return view('requests.create', compact( 'req', 'activities', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'activity_id' => 'required',
          'user_id' => 'required',
          'items' => 'required|array|min:1',
        ]);

        $req = Req::findOrFail($id);
        $req->update($request->all());
        $req->items()->sync($request->items);
        return redirect()->route('home')->with('success', 'Solicitud editado correctamente');
    }

    public function export()
    {
        //foreach (Req::all() as $item) {
        //    echo $item->items->count();
        //}
        //dd('sdf');
        return Excel::download(new RequestsExport, 'Solicitudes.xlsx');
    }
}
