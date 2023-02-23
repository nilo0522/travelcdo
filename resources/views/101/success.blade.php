@extends('layouts.agencylayout')
@section('content')
@include('101.header')
@foreach( session('hotel') as $h)
<!-- ======================= Start Page Title ===================== -->
		<div class="page-title image-title" style="background-image:url({{ asset('images/'.$h->image) }});">
			<div class="container">
				<div class="page-title-wrap">
				<h2>{{ $h->name }}</h2>
				

				</div>
			</div>
		</div>
		<!-- ======================= End Page Title ===================== -->
	
		<section>
			<div class="container">
				<div class="success-wrap text-center">
					<div class="success-text">
						<i class="ti-check cl-success font-80"></i>
						<h3>Payment Successful!</h3>
						
					
						<a href="{{ url('/') }}" class="btn theme-btn">Go To Home Page</a>
					</div>
				</div>
			</div>
		</section>

@endforeach

@endsection