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
                <h3 class="title"><h1>Crear Nuevo Usuario</h1>
            </div>
        <div class="description text-center">
        </div>
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
          		<form class="shadow bg-white rounded py-3 px-4" method="POST"
				action="{{ route('usuarios.store') }}"
				enctype="multipart/form-data">
					<h1 class="display-4">Nuevo Usuario</h1>
					<hr>
					@include('users.form', ['user' => new App\User])

					<button class="btn btn-primary">Guardar</button>
					<a class="btn btn-danger" href="{{ route('usuarios.index') }}">Cancelar</a>
				</form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection