@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-center">Crear un Nuevo Usuario</h3>
            <div class="card-body">
              <form method="POST"
                  action="{{ route('usuarios.store') }}"
                  enctype="multipart/form-data">
                    <hr>
                    @include('dashboard.users.form', ['user' => new App\User])

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a class="btn btn-danger" href="{{ route('usuarios.index') }}">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection