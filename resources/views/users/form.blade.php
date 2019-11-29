		@csrf
		<p><label for="avatar"></label>
			Foto de Perfil
			<div class="fileinput fileinput-new text-center" data-provides="fileinput">
			    <div>
			        <span class="btn btn-raised btn-round btn-default btn-file">
			            <input type="file" name="avatar" class="  @error('avatar') is-invalid @else border-0 @enderror" value="{{ $user->avatar ?? old('avatar')}}">
			        </span>
			    </div>
				@error('avatar')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</p>
			<label for="name">Nombre</label>
			<input class="form-control label-floating @error('name') is-invalid @else label-floating has-danger @enderror"
			 type="text" name="name" value="{{ $user->name ?? old('name')}}" placeholder="Nombre de Usuario">
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
	<label for="email"></label>
		Email
		<input class="form-control @error('nombre') is-invalid @else @enderror" type="email" name="email" value="{{ $user->email ?? old('email')}}" placeholder="Direccion de Correo electronico">
		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

	@unless ($user->id)
		<label for="password">Contraseña</label>
		<input class="form-control @error('nombre') is-invalid @else  @enderror" type="password" name="password" placeholder="Contraseña">
		@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

	<label for="password_confirmation"></label>
		Confirmar Contraseña
		<input class="form-control @error('nombre') is-invalid @else  @enderror" type="password" name="password_confirmation" placeholder="Confirma tu Contraseña">
		@error('password_confirmation')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

	@endunless

	<div class="checkbox">
		@foreach ($roles as $id => $name)
			<label>
				<input
					type="checkbox"
					value="{{ $id }}"
					{{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
					name="roles[]">
				{{ $name }} <br>
			</label>
		@endforeach <hr>
	{!! $errors->first('roles','<span class=error>:message</span>')  !!}
	</div>
