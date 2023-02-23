@extends('layouts.adminlayout')
@section('content')
  @foreach($rooms as $room)
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Update Rooms</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                      <li class="breadcrumb-item active">Update Rooms</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            {!! Form::open(['action' =>[ 'RoomsController@update',$room->id],'method' => 'POST','role'=>'form']) !!}
            {{ csrf_field()}}
             <div class="content">
              <div class="container-fluid">
                <div class="card">
                  <div class="card-header bg-dark p-2">
                    <div class="row">

                      <div class="col-sm-12">
                        <label class="card-title text-center" ><i class="fas fa-pen text-info"></i> Update Room
                    </label>
                    <button type="submit" class="btn btn-sm float-right btn-info text-light" ><i class="fa fa-fw fa-edit"></i> Update </button>
                      </div>
                      
                    </div>
                  </div>
                  
                  <div class="card-body">
                    <div class="row">
                       
                        <div class="col-md-6">
                          
                      <div class="row form-group">
                        
                          <label for="inputName" class="col-sm-4 col-form-label text-right"> Room type : </label>
                      
                        <div class="col-sm-6" >
                          <div class="input-group">
                            <select name="rtype" class="form-control" required>
                              <option value='' selected >-- Select --</option>
                              @foreach($types as $type)

                              <option value='{{$type->des}}' @if($type->des==$room->room_type) selected="" @endif> {{$type->des}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row form-group">
                        <label for="inputName" class="col-sm-4 col-form-label text-right"> Room amenities :</label>
                        <div class="col-sm-6">
                          <div class="input-group ">
                            <select  id='amenities' name="amenities[]" class="select2 form-control"  multiple="multiple" data-placeholder="Select Amenities" required=""> 
                              @foreach($am as $type)
                              <option value='{{$type->id}}' @foreach($amenities as $key) @if($key->amenities==$type->id) selected="" @endif @endforeach> {{$type->amenities}}</option>
                              @endforeach 
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row form-group ">
                        
                         <label for="inputName" class="col-sm-4 col-form-label text-right">Number of Person : </label>
                         <div class="col-sm-6" >
                          <input  type="number" min="1" max="3" class="form-control"placeholder="No. of Person" id="nop" name="nop" required="" value="{{$room->room_person}}" >
                        </div>
                      </div>

                      <div class="row form-group ">
                        <label for="inputName" class="col-sm-4 col-form-label text-right"> Price : </label>
                        
                        <div class="col-sm-6" >
                          <input  type="number" min="1" class="form-control"placeholder="₱" id="price" name="price" required=""  value="{{$room->room_price}}">
                        </div>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="card-body " style="display: block;">
                        <div class="col-sm-12  d-flex align-items-center justify-content-center " >
                          <img src='{{asset("images/$room->room_image")}}' id="preview_2" width="200px"  />
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-left" >Room Image</label>
                          <div class="input-group">

                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="r_image" name="r_image" onchange="preview(this);" value="{{$room->room_image}}">
                              <label class="custom-file-label" for="r_image" >{{$room->room_image}}</label>
                            </div>
                          </div>
                        </div>
                        </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
          </div>
          @method('put')
          {!! Form::close() !!}
          @endforeach
            
     
@endsection

