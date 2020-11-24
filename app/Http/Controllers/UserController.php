<?php

namespace App\Http\Controllers;

use App\Position;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $user = null;
        $roles = Role::pluck('display_name','id')->prepend('Seleccionar', -1);
        $positions = Position::pluck('name','id')->prepend('Seleccionar', -1);
        return view('users.create', compact( 'user', 'roles', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position_id' => 'required|not_in:-1',
            'role_id' => 'required|not_in:-1',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create($request->all());
        return redirect()->route('user.index')->with('success', 'Usuario creado correctamente!!');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('display_name','id')->prepend('Seleccionar', -1);
        $positions = Position::pluck('name','id')->prepend('Seleccionar', -1);

        return view('users.create', compact('roles','user', 'positions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'position_id' => 'required|not_in:-1',
            'role_id' => 'required|not_in:-1',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user)
            ],
            'password' => 'confirmed',
        ]);

        if ($request->get('password') == '') {
            $user->update($request->except('password'));
        } else {
            $user->update($request->all());
        }
        return redirect()->route('user.index')->with('success', 'Usuario editado correctamente');
    }

    public function listProcesses(User $user)
    {
        $processes = $user->position->processes->map(function ($value) {
            return collect($value->toArray())->only(['id', 'name'])->all();
        })->prepend(['id'=>-1, 'name'=>'Seleccionar']);
        return $processes;
    }
}
