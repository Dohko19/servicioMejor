		@csrf
		<div class="">
			<label for="avatar">Foto de Perfil</label>
			<div class="fileinput fileinput-new text-center" data-provides="fileinput">
			    <div>
			        <span class="btn btn-raised btn-round btn-primary btn-sm btn-file">
			            <input type="file" name="avatar" class="  @error('avatar') is-invalid @else border-0 @enderror" value="{{ $user->avatar ?? old('avatar')}}">
			        </span>
			    </div>
				@error('avatar')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
		<div class="form-group">
			<label for="name">Nombre</label>
			<input class="form-control @error('name') is-invalid @else has-danger @enderror"
			 type="text" name="name" value="{{ $user->name ?? old('name')}}" placeholder="Nombre">
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control @error('nombre') is-invalid @else @enderror" type="email" name="email" value="{{ $user->email ?? old('email')}}" placeholder="Direccion de Correo electronico">
			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror

		</div>

	@unless ($user->id)
	<div class="form-group">
		<label for="password">Contraseña</label>
		<input class="form-control @error('nombre') is-invalid @else  @enderror" type="password" name="password" placeholder="Contraseña">
		@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	<div class="form-group">
		<label for="password_confirmation">Confirmar Contraseña</label>
		<input class="form-control @error('nombre') is-invalid @else  @enderror" type="password" name="password_confirmation" placeholder="Confirma tu Contraseña">
		@error('password_confirmation')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	@endunless
@if (auth()->user()->isAdmin())
	Rol de Usuario
	<div class="form-check">
		@foreach ($roles as $id => $name)
			<label class="form-check-label">
				<input
					class="form-check-input"
					type="checkbox"
					value="{{ $id }}"
					{{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
					name="roles[]">
				{{ $name }}
				<span class="form-check-sign">
              		<span class="check"></span>
          		</span>
			</label>
		@endforeach
	{!! $errors->first('roles','<span class=error>:message</span>')  !!}
	</div>

@endif
<hr>
@unless (!$user->id)
	<h3 class="card-title"><b>Completa tu Perfil (informaióm Basica)</b></h3>
	{{-- Rellenar el formulario --}}
		<div class="form-row">
			<div class="col-md-4">
				<label for="last_name">Apellidos</label>
				<input class="form-control @error('last_name') is-invalid @else  @enderror" type="text" name="last_name" placeholder="Apellido Paterno/Materno" value="{{ $user->last_name ?? old('last_name')}}">
					@error('last_name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
			</div>
			<div class="col-md-4">
				<label for="name_deal">Nombre del Negocio/Servicio</label>
				<input class="form-control @error('name_deal') is-invalid @else  @enderror" type="text" name="name_deal" placeholder="Nnombre del negocio" value="{{ $user->name_deal ?? old('name_deal')}}"> >
					@error('name_deal')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
			</div>
			<div class="col-md-4">
				<label for="phone">Telefono</label>
				<input class="form-control @error('phone') is-invalid @else  @enderror" type="text" name="phone" placeholder="Apellido Paterno/Materno" value="{{ $user->phone ?? old('phone')}}">
					@error('phone')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
			</div>
		</div>
		<div class="form-row">

			<div class="col-md-5">
				<label for="services_type">Tipo de Servicio</label>
				<input class="form-control @error('services_type') is-invalid @else  @enderror" type="text" name="services_type" placeholder="Tipo y/o Descripcion del servicio" value="{{ $user->services_type ?? old('services_type')}}">
					@error('services_type')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
			</div>
			<br>
			<div class="col-md-6">
				<label for="hours_atention">Horario de atencion</label>
				<input class="form-control @error('hours_atention') is-invalid @else  @enderror" type="text" name="hours_atention" placeholder="Ej.. lunes a viernes 7:00 a 20:00" value="{{ $user->hours_atention ?? old('hours_atention')}}">
					@error('hours_atention')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
			</div>
		</div><br>
		<div class="form-row">
			<div class="col-md-12">
				<label for="address">Direccion</label>
				<textarea class="form-control @error('address') is-invalid @else  @enderror" type="text" name="address" placeholder="Direcion">{{ $user->address ?? old('address')}}</textarea>
					@error('address')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
			</div>
		</div>
	@endunless