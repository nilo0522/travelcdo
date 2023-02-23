
@extends('layouts.adminlayout')
@section('content')
<div class="content-header ">
  
  <section class="content">
    <div class="card card-primary card-tabs">
      @include('admin.hotel.Tabheader')
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
           <div class="tab-pane fade {{$show1}} {{$active1}}" id="custom-tabs-one-home" role="tabpanel" 
          @if(count($hotel)<=0)
            @include('admin.hotel._hoteldetails')
             @else
             @foreach($hotel as $h)
            aria-labelledby="custom-tabs-one-home-tab">
             @include('admin.hotel.hoteldetails')
              
              @endforeach
              @endif
              </div>
              <div class="tab-pane fade {{$show2}} {{$active2}}" id="gallery" role="tabpanel" aria-labelledby="  custom-tabs-one-profile-tab">
                @include('admin.hotel.gallery')
              </div>
              <div class="tab-pane fade {{$show3}} {{$active3}}" id="facilities-tab" role="tabpanel" aria-labelledby="  custom-tabs-one-profile-tab">
              @include('admin.hotel.facilities')
              </div>
        </div>
      </div>
    </div>
  </section>
</div>

 <script>
  var loadFile = function(event) {
    var output = document.getElementById('preview_1');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<script type="text/javascript">
  $('#managehotel').addClass('active menu-open');
  $('#hpro').addClass('active ');
</script>
@endsection
