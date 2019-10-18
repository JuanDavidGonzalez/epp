<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $user = null;
        $roles = Role::pluck('display_name','id')->prepend('Seleccionar', -1);
        return view('users.create', compact( 'user', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'role_id' => 'required|not_in:-1',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create($request->all());
        return redirect()->route('user.index')->with('success', 'Usuario creado correctamente!!');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('display_name','id')->prepend('Seleccionar', -1);
        //dd($roles, $user);
        return view('users.create', compact('roles','user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'role_id' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        return redirect()->route('user.index')->with('success', 'Usuario editado correctamente');
    }
}
