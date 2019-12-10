@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        	<div class="card-header">
        		<h3 class="card-title text-center">Editar/Actaulizar información: {{ $user->name }}</h3>
        		<div class="card-body">
        			<form method="POST" action="{{ route('usuarios.update', $user->id) }}"
    					enctype="multipart/form-data">
    					{!! method_field('PUT') !!}

    					<div class="card card-profile">
        					<div class="card-avatar">
     				   			<img width="150px" src="{{ Storage::url($user->avatar) }}" alt="">
        					</div>
        					<div class="card-body">
        						@include('dashboard.users.form')<br>
    							<button class="btn btn-primary btn-block">Enviar</button>
        					</div>
        				</div>
    				</form>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection