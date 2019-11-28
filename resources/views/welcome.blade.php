@extends('layouts.layout')
@section('body-class', 'landing-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('images/fondo.jpg') }}')">
	<div class="container">
		<div class="row">
			<h1 class=" title text-center" style="color: white;"> This is Awesome</h1>
		</div>
	</div>
</div>
<div class="main main-raised">
    <div class="container">
    	<div class="section text-center">
    		<div class="row">
    			<div class="col-md-8 ml-auto mr-auto">
    				<h2 class="title">Nosotros</h2>
    				<h5 class="description">Aqui una descripcion de nosotros :v</h5>
    			</div>
    		</div>
    	</div>
    	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="{{ asset('images/fondo.jpg') }}" alt="First slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="{{ asset('images/fondo.jpg') }}" alt="Second slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="{{ asset('images/fondo.jpg') }}" alt="Third slide">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
    </div>
    <hr><br><br>
</div>
<div class="main main-raised" style="background-color: #444444; color: white;">
	<div class="container">
		<br>
		<br>
		<br>
		<br><h1 class="text-center">Some Text Hear</h1>
		<br>
		<br>
		<br>
		<br>
	</div>
</div>

{{-- Modal --}}

@endsection