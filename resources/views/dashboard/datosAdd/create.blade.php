@extends('layouts.dashboard')
@section('content')
<div class="row">
	<div class="col-md-8 col-xl-12 col-sm-4">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Agrega informacion adicional</h4>
              <p class="card-category">Añade informacion relevante con respecto a tu servicio/negocio para que tus clientes o personas que requieran un servicio como el que ofreces se sientan confiados elegirte a ti.</p>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('datosadd.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
							<label for="business_image">Logo/Foto de comercio</label>
						<div class="col-md-6">
							<div class="fileinput fileinput-new text-center" data-provides="fileinput">
							    <div>
							        <span class="btn btn-raised btn-round btn-primary btn-sm btn-file">
							            <input id="files" type="file" name="business_image" class="  @error('business_image') is-invalid @else border-0 @enderror" value="{{ $user->business_image ?? old('business_image')}}">
							        </span>
							    </div>
								@error('business_image')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								<div class="col-md-4 col-sm-3 col-xs-3 col-lg-12">
								<div class="">
							    	<img class="rounded" id="image" width="250px" />
							    </div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="container">

						</div>
					</div>
				</div><br><br>
					<div class="form-row">
						<div class="col-md-4 col-sm-4 col-lg-4">
							<label for="rfc">RFC</label>
							<input type="text" name="rfc" class="form-control @error('rfc') is-invalid @else  @enderror" placeholder="RFC del tu negocio/servicio">
								@error('rfc')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
						<div class="col-md-4 col-sm-4 col-lg-4">
							<label for="cedula_profesional">Cedula Profesional</label>
							<input type="text" name="cedula_profesional" class="form-control @error('cedula_profesional') is-invalid @else  @enderror" placeholder="Cedula profesional en caso de tenerla"><small>Este campo puede dejarlo vacio</small>
								@error('cedula_profesional')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
						<div class="col-md-4 col-sm-4 col-lg-4">
							<label for="certificacion">Certificaciones</label>
							<input type="text" name="certificacion" class="form-control @error('certificacion') is-invalid @else  @enderror" placeholder="Tu negocio cuenta con alguna certificacion?"><small>Si tienes mas de una puedes separarla por comas ( , )</small>
								@error('certificacion')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-4 col-sm-6 col-lg-12">
							<label for="permisos_especiales">Permisos Especiales en tu Negocio</label>
							<textarea name="permisos_especiales" class="form-control @error('permisos_especiales') is-invalid @else  @enderror" placeholder="Permisos especiales como (alcohol, medicamentos con receta, venta o renta de equipo)" rows="3"></textarea>
								@error('permisos_especiales')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
						<div class="col-md-4 col-sm-6 col-lg-12">
							<label for="otro">Servicios Adicionales u Otros</label>
							<textarea name="otro" class="form-control @error('otro') is-invalid @else  @enderror" placeholder="Algun Servicio adicional" rows="3"></textarea>
								@error('otro')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="form-check">
						    <label class="form-check-label">
						        <input class="form-check-input" type="checkbox" name="tiempo_completo">
									Servicio las 24 Horas?
						        <span class="form-check-sign">
						            <span class="check"></span>
						        </span>
						    </label>
						</div>
						<div class="form-check">
						    <label class="form-check-label">
						        <input class="form-check-input" type="checkbox" name="servicios_externos">
									Algun servicio externo o adicional
						        <span class="form-check-sign">
						            <span class="check"></span>
						        </span>
						    </label>
						</div>
						<div class="form-check">
						    <label class="form-check-label">
						        <input class="form-check-input" type="checkbox" name="domicilio">
									Servicio a Domicilio?
						        <span class="form-check-sign">
						            <span class="check"></span>
						        </span>
						    </label>
						</div>
						<div class="form-check">
						    <label class="form-check-label">
						        <input class="form-check-input" type="checkbox" name="atencion_inmediata">
									Atencion Inmediata(sin esperas)
						        <span class="form-check-sign">
						            <span class="check"></span>
						        </span>
						    </label>
						</div>
						{!! $errors->first('roles','<span class=error>:message</span>')  !!}
					</div>
					<button type="submit" class="btn btn-primary btn-round">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
@section('scripts')
	<script>
    document.getElementById("files").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>
@endsection