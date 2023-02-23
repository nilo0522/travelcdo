@extends('layouts.agencylayout')
@section('content')
@include('101.header')
<!-- ======================= Start Navigation ===================== -->
		
		<!-- ======================= End Navigation ===================== -->
		
		<!-- ======================= Slide Multiple Booking Start Banner ===================== -->
		<section class="main-banner scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
			<div class="slideshow-container">
				<!-- slideshow-item -->	
				<div class="slideshow-item">
					<div class="bg"  data-bg="{{asset('images/bg3.jpg')}}"></div>
				</div>
				<div class="slideshow-item">
					<div class="bg"  data-bg="{{asset('images/bg6.jpg')}}"></div>
				</div>
				<div class="slideshow-item">
					<div class="bg"  data-bg="{{asset('images/bg7.jpg')}}"></div>
				</div>
				<!--  slideshow-item end  -->	
				<!-- slideshow-item -->	
				
				<!--  slideshow-item end  -->	                        
			</div>
			<div class="overlay"></div>
			
				@if(Request::is('/'))
				@include('101.search')
				@endif

		</section>
		<!-- ======================= Slide Multiple Booking End Banner ===================== -->
		<div class="clearfix"></div>
		
		<!-- ====================== Popular Destinations ================= -->
		@include('101.tour')
		<!-- ====================== Popular Destinations ================= -->		
		<div class="clearfix"></div>
		
		@include('101.hotel')
	

@endsection