  @extends('layouts.adminlayout')
@section('content')

<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Room Gallery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Room Gallery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="row">
  <div class="col-md-6">
      <div class="card card-primary ">
        <div class="card-header">@foreach($rooms as $r) {{$r->room_type}} @endforeach
            <div class="card-tools ">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
        </div>
        <div class="card-body " style="display: block;">
              <div class="col-md-12  d-flex align-items-center justify-content-center">
                <img src='' id="profile-img-tag1" width="200px"  />
              </div>
              {!! Form::open(['action' => 'RoomsGalleryController@store','method' => 'POST','id'=>'gal'] ) !!}
              <div class="form-group">
                <label for="exampleInputFile">Upload Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <label class="custom-file-label" for="h_gallery" ></label>
                    <input type="file" class="custom-file-input" id="h_gallery" name="image"  onclick="$('#g').show()">
                    
                  </div>
                  <div class="input-group-append" style="display: none" id="g">
                    <span class="input-group-text"   ><a href="#" onclick="$('#gal').submit();"  >
                      <i class="fa fa-upload"></i></a>
                    </span>
                  </div>
                </div>
              </div>
              <input type="hidden" name="room_id" @foreach($rooms as $k) value="{{$k->id}}" @endforeach>
            {!!Form::close()!!}
        </div>
      </div>
  </div>
  <div class="col-md-6">
    <div class="card card-secondary">
      <div class="card-header">
        <div class="card-title"><i class="fa  fa-picture-o text-primary"></i><span></span> Gallery
        </div>
        <div class="card-tools ">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
         @if(count($r_gallery) >0)
            @foreach($r_gallery as $g)
          <div class="col-sm-2">
            

            <a href="" data-toggle="modal" data-target="#g{{$g->id}}">
              <img src='{{asset("images/$g->image")}}' class="img-fluid mb-2" alt="hotel image">
            </a>
            
          </div>

          <div class="modal fade" id="g{{$g->id}}">
            <div class="modal-dialog modal-md ">
              <div class="modal-content  " style="background-color: rgb(72,99,160,0.3);">
                <div class="">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right: 10px">
                    <span aria-hidden="true" style="color:#ededed ">
                      <i class="fa fa-times-circle "></i>
                    </span>
                  </button> 
                </div>
                <h4 align="center" style="color: red">{{$g->image}}</h4>
                <div class="card-body" style="">
                  <img class="imgs" src='{{asset("images/$g->image")}}'>
                  <div class="over">
                    <div class="con">
                      {!!Form::open(['action' => ['RoomsGalleryController@destroy',$g->id],'method' => 'POST','id' => 'g'.$g->id ])
                      !!}
                      <button type="submit" class="btn"><i class="fa fa-trash text-danger  fa-3x"></i>
                      </button>
                      <input type="hidden" name="room_id" @foreach($rooms as $k) value="{{$k->id}}" @endforeach>
                     {{Form::hidden('_method','DELETE')}}
                      {!!Form::close()!!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           @endforeach
            @endif
        </div>
      </div>
    </div>
  </div>
</div>
</div>



@endsection