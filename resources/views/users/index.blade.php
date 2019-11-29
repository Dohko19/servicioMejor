@extends('layouts.layout')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('images/fondo.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <div class="profile">
            </div>
          </div>
        </div>
            @if( session()->has('info') )
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('info') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
            @endif
            <div class="name text-center">
                <h3 class="title">Hola {{ auth()->user()->name }}</h3>
            </div>
        <div class="description text-center">
          <p>En esta seccion podremos editar actualizar y borrar usuarios, al borrar usuarios solo tendran acceso los superadmins ya que es informacion valiosa</p>
        </div>
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            @if (auth()->user()->isAdmin())
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
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
