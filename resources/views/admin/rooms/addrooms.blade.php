@extends('layouts.adminlayout')
@section('content')

            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Add Rooms</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                      <li class="breadcrumb-item active">Add Rooms</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            {!! Form::open(['action' => 'RoomsController@store','method' => 'POST','role'=>'form']) !!}
            {{ csrf_field()}}
             <div class="content">
              <div class="container-fluid">
                <div class="card">
                  <div class="card-header bg-dark p-2">
                    <div class="row">

                      <div class="col-sm-12">
                        <label class="card-title text-center" ><i class="fa fa-plus-circle text-success"></i> Add New Room
                    </label>
                    <button type="submit" class="btn btn-sm float-right btn-primary text-light" ><i class="fa fa-fw fa-save "></i>Save </button>
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
                            <select name="room_type" class="form-control" required>
                              <option value='' selected >-- Select --</option>
                              @foreach($types as $type)
                              <option value='{{$type->des}}'> {{$type->des}}</option>
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
                              <option value='{{$type->id}}'> {{$type->amenities}}</option>
                              @endforeach 
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row form-group ">
                        
                         <label for="inputName" class="col-sm-4 col-form-label text-right">Number of Person : </label>
                         <div class="col-sm-6" >
                          <input  type="number" min="1" max="3" class="form-control"placeholder="No. of Person" id="nop" name="nop" required="" value="{{old('nop')}}" >
                        </div>
                      </div>

                      <div class="row form-group ">
                        <label for="inputName" class="col-sm-4 col-form-label text-right"> Price : </label>
                        
                        <div class="col-sm-6" >
                          <input  type="number" min="1" class="form-control"placeholder="₱" id="price" name="price" required=""  value="{{old('price')}}">
                        </div>
                      </div>
                        <div class="row form-group ">
                        <label for="inputName" class="col-sm-4 col-form-label text-right"> Qty : </label>
                        
                        <div class="col-sm-6" >
                          <input  type="number" min="0" class="form-control" placeholder="Quantity" id="qty" name="qty" required=""  value="{{old('qty')}}">
                          <input type="hidden" name="qty_left">
                        </div>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="card-body " style="display: block;">
                        <div class="col-sm-12  d-flex align-items-center justify-content-center " >
                          <img src='' id="r_out" width="200px"  />
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-left" >Room Image</label>
                          <div class="input-group">

                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="r_image" name="r_image" onchange="room();">
                              <label class="custom-file-label" for="r_image"  id="r_label">Select Image</label>
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
          {!! Form::close() !!}
           
  <script>
   function room() {
    var output = document.getElementById('r_out');
   var i=document.getElementById("r_image").files[0].name;
     $('#r_out').attr('src', "{{  asset('images/') }}/"+i);
     $('#r_label').text(i);
  };
</script>   
<script type="text/javascript">
  $('#managerooms').addClass('active menu-open');
  $('#addrooms').addClass('active ');
</script>
@endsection

