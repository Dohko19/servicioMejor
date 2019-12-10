@extends('layouts.dashboard')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
  @if( session()->has('info') )
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{ session('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  @endif
      <div class="card-header card-header-primary">
        <h4 class="card-title">Hola {{ auth()->user()->name }}</h4>
        @if (Auth::user()->isAdmin() || Auth::user()->isCampo())
        <p class="card-category">Desde aqui puede administrar a los Usuarios</p>
        @else
        <p class="card-category">Informacion Basica de tu Perfil</p>
        @endif
      </div>
      <div class="card-body">
          <div class="row">
              <div class="col-md-8 col-lg-12">
                  <a href="{{ route('usuarios.create') }}" class="btn btn-info pull-right">Crear Usuario</a>
                  <table class="table">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Email</th>
                              <th>Rol</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $user)
                          <tr>
                              <td>{{ $user->id }}</td>
                              <td><a href="{{ route('usuarios.show', $user->id) }}">{{ $user->name }}</a></td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->roles->pluck('display_name')->implode(' - ')  }}</td>
                              <td class="text-left">
                                  <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-sm btn-warning btn-rounded">
                                      <i class="material-icons">
                                          edit
                                      </i>
                                  </a>
                                  <form style="display: inline;"
                                              method="POST"
                                              action="{{ route('usuarios.destroy', $user->id)}}">
                                          @csrf
                                          {{ method_field('DELETE') }}
                                          <button type="submit" class="btn btn-sm btn-rounded btn-danger">
                                              <i class="material-icons">
                                               delete_forever
                                              </i>
                                          </button>
                                  </form>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
