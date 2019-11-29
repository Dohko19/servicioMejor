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
        <div class="name text-center">
                <h3 class="title">Editando a: {{ $user->name }}</h3>
            </div>
		<form class="shadow bg-white rounded py-3 px-4"
		method="POST"
		action="{{ route('usuarios.update', $user->id) }}"
		enctype="multipart/form-data">
			<h1 class="display-4">Editar Usuario</h1>
			<hr>
			{!! method_field('PUT') !!}
			<div class="container">
			<img width="100px" src="{{ Storage::url( $user->avatar ) }}" alt="">
			</div>
		@include('users.form')
		<button class="btn btn-primary">Enviar</button>
		</form>
		</div>
	</div>
</div>
@endsection