  @extends('layouts.adminlayout')
@section('content')


<div class="content-header">
  <section class="content">
    <div class="card">
      <div class="card-header" style="background-color:#6c757d">
        <h3 class="card-title text-white">List of Rooms</h3>
        <div class="btn-group float-right">
          <a href="{{ url('admin/addrooms') }}" class="btn btn-sm  bg-success"><i class="fa fa-plus"></i> New</a>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table id="tblr" class="table table-striped table-hover" >
          
            <thead>
            <tr >
              <th width="5px">No.</th>
              <th style="text-align: center">Accommodation</th>
              <th style="text-align: center">Gallery</th>
              
              <th>Price</th>
              <th>Qty</th>
              <th>Qty left</th>
              
              <th style="text-align: center">Action</th>
            </tr>
          </thead>
        
          
          <tbody>
            @foreach($rooms as $room)
                 <tr >
                     <td><span data-toggle="modal" data-target="#room{{$room->id}}" class="badge badge-info">{{$room->id}}</span></td>
                     <td  style="text-align: center;cursor: pointer;" ><u><span data-toggle="modal" data-target="#room{{$room->id}}" class="badge "><u>{{$room->room_type}}</u></span></td>
                     <td><a href="{{url('admin/rooms-gallery/'.$room->id)}}"><i class="fa fa-image text-primary"></i></a></td>
                    
                     <td>₱ {{number_format($room->room_price)}}</td>
                     <td><span class="badge ">{{$room->room_qty}}</span>   </td>
                     <td><span class="badge ">{{$room->room_qty_left}}</span> <span class="badge badge-warning"> left available</span></td>
                     
                     <td><a href="{{url('admin/rooms/'.$room->id)}}"><span class="badge badge-info"><i class="fa fa-pencil"> Edit</i> </span></a>
                      <a href="#" data-toggle="modal" data-target="#del{{$room->id}}"><span class="badge badge-danger"><i class="fa fa-trash">  Delete</i> </span></a>
                     </td>
                </tr>
                <div class="modal fade" id="room{{$room->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header p-0 border-0">
              <label class="modal-title " style="padding-left: 20px">{{$room->room_type}}</label> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times-circle"></i>
              </button>
            </div> 
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                   <div class=""  style='background-image: url({{asset("images/$room->room_image")}});background-size: 100% 100%;height: 250px'>
                        
                      </div>
                   <div class="col-sm-12  ">
                          <label class="text-success bold">₱ {{ number_format($room->room_price) }} for 1 night</label>
                        </div>
                        <div class="col-sm-12">
                          <label class="" ><span class="badge " style="border:solid black;border-width: 1px" >Max Person : <span class="badge badge-info">{{ $room->room_person}}</span> (included) 1 child</span></label>
                        </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-12">
                      @foreach($am as $amen)
                        
                          @if($room->id==$amen->room_id)
                          @foreach($amenities as $key)
                            @if($key->id == $amen->amenities_id)
                          
                            <span class=" badge badge-lg text-success " style="border:solid black;border-width: 1px" ><i class="outline">{{$key->amenities}}<i></span>
                              @endif
                              @endforeach
                              @endif
                         
                      @endforeach
                    </div>
                    <div class="col-sm-12">
                      <p class="text-justify">
                        Air-conditioned room features a flat-screen cable TV, iPod dock and safe. A seating area and private bathroom with shower, haidryer and free toiletries are included.
                          <br>
                        Guests have access to the Executive Club Lounge.

                       
                      </p>
                    </div>
                    
                  </div>
                  
                </div>
                
              </div>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


        <div style="top: 50px" class="modal fade" id="del{{$room->id}}">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header p-1 bg-danger text-center">
                          <div class="col-sm-12 text-center">
                            <label  ><i class="fa fa-warning"></i> Are you sure?</label>
                          <a  class="close" data-dismiss="modal" aria-label="Close">
                           <i class="fas fa-times-circle"></i>
                            </a>
                          </div>
                          
                          </div>
                          <div class="modal-body">
                              <div class="card-body">
          {!! Form::open(['action' => ['RoomsController@destroy',$room->id],'method' => 'POST'] ) !!}
          
                    
            
            <label style="color:  #999" class=" text-center">Do you really want to delete these room? This process cannot be undone.</label>
            <div class="button-group col-sm-12 " align="center">
              <button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary">Cancel</button>
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </div>
          
          @method('delete')
          {!!Form::close()!!}

                          </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
  $('#managerooms').addClass('active menu-open');
  $('#viewrooms').addClass('active ');
</script>
@endsection