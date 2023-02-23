@extends('layouts.adminlayout')
@section('content')



     

     <div class="content text-sm">
      <div class="container-fluid">
         <div class="card">
          <div class="card-header" style="background-color:#6c757d">
           <label class="card-title text-white">Amenities</label>
            {!! Form::open(['action' => 'RoomamenitiesController@store','method' => 'POST']) !!}
     
               
               <div class="input-group input-group-sm col-sm-6">
                
                  {{Form::text('amenities','',['class'=> ' form-control'])}}
              <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-plus bg-info"></i></button>
                  </span>
               </div>
              
        
            {!! Form::close() !!}
          </div>
                  
                    <div class="card-body">
                      <table id="tblr" class="table">
                        <thead>
                          <tr>
                            <th >No.</th>
                            <th  >Room Amenities  </th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php($c=1)
                          @foreach($amenities as $key)
                          <tr>

                            <td>{{$c++}}</td>
                            <td> <b><p id="a{{$key->id}}">{{$key->amenities}}</p></b>{!!Form::open(['action' => ['RoomamenitiesController@update',$key->id],'method' => 'POST'])!!}<input type="text" name="{{$key->id}}" id="{{$key->id}}" value="{{$key->amenities}}" style="display: none;">{{Form::hidden('_method','PUT')}} {!!Form::close()!!}</td>
                              <td>
                                <div class="btn-group">
                                {!!Form::open(['action' => ['RoomamenitiesController@destroy',$key -> id],'method' => 'POST'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    <a  onclick="$('#{{$key->id}}').show();$('#a{{$key->id}}').hide()" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                    <button type="submit" class="btn-sm  btn btn-danger"><i class="fa fa-trash"></i></button>
                                  {!!Form::close()!!}
                                </div>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
      </div>
      </div>
      
    </div>


      <script type="text/javascript">
  $('#managerooms').addClass('active menu-open');
  $('#addam').addClass('active ');
</script>
@endsection