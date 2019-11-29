@extends('layouts.layout')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('images/fondo.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
            </div>
          </div>
        </div>
            <div class="name text-center">
                <h3 class="title"><h1>Perfil de: {{ $user->name }}</h1>
            </div>
        <div class="description text-center">
          <p>En esta seccion podremos editar actualizar y borrar usuarios, al borrar usuarios solo tendran acceso los superadmins ya que es informacion valiosa</p>
        </div>
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
          		<div class="card text-center" style="width: 20rem;">
			  <div class="card-body">
          			<img width="150px" src="{{ Storage::url($user->avatar) }}" alt="">
			  </div>
          	</div>
          	<table class="table">
		<tr>
			<th>Nombre: </th>
			<td>{{ $user->name }}</td>
		</tr>
		<tr>
			<th>Email: </th>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<th>Roles: </th>
			<td>@foreach($user->roles as $role)
				{{ $role->display_name }}
			@endforeach</td>
		</tr>
	</table>
	@can('edit', $user)
	<a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-info">Editar</a>
	@endcan

{{-- 	@can('destroy', $user)
	   <form style="display: inline;"
							method="POST"
							action="{{ route('usuarios.destroy', $user->id)}}">
						{!! csrf_field() !!}
						{{ method_field('DELETE') }}

						<button class="btn btn-outline-danger" type="submit">Eliminar mi Cuenta</button>
					</form>
	@endcan --}}
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection