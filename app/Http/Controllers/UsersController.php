<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        $users = User::with(['roles'])->get();

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('display_name', 'id');
        return view('dashboard.users.create',compact('roles'));
    }

    public function store(CreateUserRequest $request)
    {
        $user =(new User)->fill($request->all());
        // $user = User::create($request->all());
        $user->avatar = $request->file('avatar')->store('public');
        $user->save();

        $user->roles()->attach($request->roles);

        return redirect()->route('usuarios.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $users = User::with(['datosAdd'])->whereIn('id', $user)->first();
        // if(auth()->user()->datosAdd == null)
        // {
        // return redirect()->route('datosadd.create')->with('info', 'Debes completar esta informacion antes de acceder a tu perfil de usuario');

        // }
        return view('dashboard.users.show', compact('user','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('edit',$user);
        $roles = Role::pluck('display_name', 'id');
        return view('dashboard.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize($user);
        if ($request->hasFile('avatar')) {
        $user->avatar = $request->file('avatar')->store('public');
        }
        $user->update($request->except(['avatar']));
        $user->roles()->sync($request->roles);
        return redirect()->route('dashboard.index')->with('info', 'Usuario Actualizado');

    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('destroy', $user);
        $user->delete();
        $user->roles()->sync([]);
        return back();
    }
}
