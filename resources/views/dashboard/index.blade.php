@extends('layouts.dashboard')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
    	<div class="card-body">
          <div class="row">
          	<div class="col-md-12 col-lg-12">
		    	@if (auth()->user()->isAdmin() || Auth::user()->isUser())
					<h2 class="h2">Mi Agenda Electronica:</h2>
				@endif
          	</div>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection