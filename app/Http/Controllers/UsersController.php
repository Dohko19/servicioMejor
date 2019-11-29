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

        return view('users.index', compact('users'));
    }

    function create()
    {
        $roles = Role::pluck('display_name', 'id');
        return view('users.create',compact('roles'));
    }

    function store(CreateUserRequest $request)
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

        return view('users.show', compact('user'));
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
        return view('users.edit', compact('user','roles'));
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

        $user->update($request->only('name', 'email'));
        $user->roles()->sync($request->roles);
        return redirect()->route('usuarios.index')->with('info', 'Usuario Actualizado');

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
