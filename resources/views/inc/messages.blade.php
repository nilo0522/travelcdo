
@if(count($errors) > 0)
	@foreach($errors -> all() as $error)
		
<script type="text/javascript">
	toastr.error("{{$error}}");
</script>

	@endforeach



@endif
@if(session('c_error'))


<script type="text/javascript">
     $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer:3000,
      
    });

   
      Toast.fire({
        type: 'error',
        title: '{{session('c_error')}}',
      })
   
   });
</script>
 

@endif
@if(session('success'))


<script type="text/javascript">
	toastr.success("{{session('success')}}");
</script>
 

@endif

@if(session('error'))


<script type="text/javascript">
	toastr.error("{{session('error')}}");
</script>
@endif

@if(session('newroom'))
		



<script type="text/javascript">
   $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      
    });

   
      Toast.fire({
        type: 'success',
        title: '<a  href="" data-toggle="modal" data-target="#room" class="text-dark"><u>{{session('room.room_type')}}</u> </a><span style="margin-left:5px;"></span> successfully added',
      })
   
	 });
</script>

 <div class="modal fade" id="room">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header p-0 border-0">
              <label class="col-md-6 " style="padding-left:10px ">{{session('room.room_type')}}</label> 
              <button type="button" class="btn btn-sm close" data-dismiss="modal" >
                <i class="fa fa-times-circle"></i>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                   <div class=""  style="background-image: url({{asset('images/'.session('room.r_image'))}});background-size: 100% 100%;height: 250px">
                        
                      </div>
                      <div class="col-sm-12  ">
                          <label class="text-success bold">₱ {{ number_format(session('room.price')) }} for 1 night</label>
                        </div>
                        <div class="col-sm-12">
                          <label class="" ><span class="badge " style="border:solid black;border-width: 1px" >Max Person : <span class="badge badge-info">{{  session('room.nop')}}</span> (included) 1 child</span></label>
                        </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-12">
                     @foreach(session('room.amenities') as $ams => $key)
                      @foreach($am as $amen)
                          @if($amen->id == $key)
                          
                            <span class=" badge badge-lg text-success " style="border:solid black;border-width: 1px" ><i class="outline">{{$amen->amenities}}<i></span>
                        
                          
                          @endif
                      @endforeach
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



@endif