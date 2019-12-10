@extends('layouts.dashboard')
@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
              <h4 class="card-title">Edita tu Perfil</h4>
              <p class="card-category">Aqui Puedes Completar tu Perfil</p>
            </div>
            <div class="card-body">
            	<table class="table">
            		<thead>
	            		<tr>
							<th>Nombre: </th>
							<td>{{ $user->name }}</td>
						</tr>
						<tr>
							<th>Email: </th>
							<td>{{ $user->email }}</td>
						</tr>
						<tr>
							<th>Nombre del Negocio:</th>
							<td>{{ $user->name_deal }}</td>
						</tr>
						<tr>
							<th>Roles: </th>
							<td>@foreach($user->roles as $role)
								{{ $role->display_name }}
							@endforeach</td>
						</tr>
            		</thead>

				</table>
            </div>
		</div>
	</div>
	<div class="col-md-4">
    	<div class="card card-profile">
    		<div class="card-avatar">
    			<img src="{{ Storage::url($user->avatar) }}" alt="">
    		</div>
    		<h6 class="card-category text-gray">{{ $user->name . $user->last_name}} </h6>
    		 <h4 class="card-title">{{ $user->phone }}</h4>
    		 <p class="card-description">
    		@can('edit', $user)
				<a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-info">Editar mi perfil</a>
			@endcan
    		 </p>
    	</div>
    </div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				@if ($users->datosAdd == null)
				@can('edit', $user)
					<a class="pull-right btn btn-warning btn-round"
	                 href="{{ route('datosadd.create') }}"
	                 rel="tooltip" data-placement="top" title="RFC,Cedula y/o Servicios Especiales">Agregar Info adicional</a>
	            @endcan
	            @else
	            @can('edit', $user)
	            	<a class="pull-right btn btn-warning btn-round"
	                 href="{{ route('datosadd.edit', $users->datosAdd->id) }}"
	                 rel="tooltip" data-placement="top" title="RFC,Cedula y/o Servicios Especiales, imagen del negocio">Editar Info adicional</a>
	            @endcan
				@endif

              <h4 class="card-title">Informacion adicional</h4>
              <p class="card-category">Añade informacion acerca de tu nogicio/servicio</p>
            </div>
			<div class="card-body">
		    	<table class="table table-hover">
		    		<thead>

						<tr>
							<th>Nombre del negocio: </th>
							<td>{{ $user->name_deal ?? 'Falta mas informacion'}}</td>
						</tr>
						<tr>
							<th>RFC: </th>
							<td>{{ $users->datosAdd->rfc ?? 'Informacion incompleta'}}</td>
						</tr>
						<tr>
							<th>Cedula Profesional: </th>
							<td>{{$users->datosAdd->cedula_profesional ?? 'Informacion incompleta'}}</td>
						</tr>
						<tr>
							<th>Certificacion: </th>
							<td>{{ $users->datosAdd->certificacion ?? 'Informacion incompleta'}}</td>
						</tr>
						<tr>
							<th>Información Adicional: </th>
							<td>{{ $users->datosAdd->otros ?? 'Informacion incompleta' }}</td>
							<td>{{ $users->datosAdd->permisos_especiales ?? 'Informacion incompleta'}}</td>
						</tr>
		    		</thead>
				</table>
		    </div>
		</div>
    </div>
    <div class="col-md-4">
    	<div class="card card-profile">
    		<div class="card-avatar">
    			<img src="{{ Storage::url($user->datosAdd->business_image ?? 'business.png') }}" alt="">
    		</div>
    		<h6 class="card-category text-gray">{{ $user->name_deal }}</h6>
    		 <h4 class="card-title">Datos Generales del negocio</h4>
    		 <p class="card-description">
    		 	{{ $user->address }}
    		 </p>
    		 <p class="card-description">Fines de semana: <b>{{ $user->datosAdd->fines_semana == false ? 'No' : 'Si' }}</b></p>
    		 <p class="card-description">24 horas: <b>{{ $user->datosAdd->tiempo_completo == false ? 'No' : 'Si' }}</b></p>
    		 <p class="card-description">A Domicilio:<b> {{ $user->datosAdd->domicilio == false ? 'No' : 'Si' }}</b></p>
    		 <p class="card-description">Atencion Inmediata: <b>{{ $user->datosAdd->atencion_inmediata == false ? 'No' : 'Si' }}</b></p>
    		 <p class="card-description">Servicios Externos: <b>{{ $user->datosAdd->servicios_externos == false ? 'No' : 'Si' }}</b></p>
    	</div>
    </div>
</div>
@endsection