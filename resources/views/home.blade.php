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
                <h3 class="title">Hola {{ auth()->user()->name }}</h3>
            </div>
        <div class="description text-center">
          <p>En esta seccion podremos editar actualizar y borrar usuarios, al borrar usuarios solo tendran acceso los superadmins ya que es informacion valiosa</p>
        </div>
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
