<div class="row">
	<div class="col-md-6">
			<div class="card card-primary ">
				<div class="card-header">Select Image
						<div class="card-tools ">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
				</div>
				<div class="card-body " style="display: block;">
							<div class="col-md-12  d-flex align-items-center justify-content-center">
								<img src='' id="gal_out" width="200px"  />
							</div>
							{!! Form::open(['action' => 'HotelgalerryController@store','method' => 'POST','id'=>'gal'] ) !!}
							<div class="form-group">
								<label for="exampleInputFile">Upload Image</label>
								<div class="input-group">
									<div class="custom-file">
										<label class="custom-file-label" for="h_gallery" ></label>
										<input type="file" class="custom-file-input" id="h_gallery" name="image"  onclick="$('#g').show()" onchange="load(this.value)">
										
									</div>
									<div class="input-group-append" style="display: none" id="g">
										<span class="input-group-text"   ><a href="#"  onclick="$('#gal').submit();" >
											<i class="fa fa-upload"></i></a>
										</span>
									</div>
								</div>
							</div>
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
					@if(count($gal)>0)
					@foreach($gal as $g)
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
											{!!Form::open(['action' => ['HotelgalerryController@destroy',$g->id],'method' => 'POST','id' => 'g'.$g->id ])
											!!}
											<button type="submit" class="btn"><i class="fa fa-trash text-danger  fa-3x"></i>
											</button>
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

<script>
   function load(event) {
    var output = document.getElementById('gal_out');
   var i=document.getElementById("h_gallery").files[0].name;
     $('#gal_out').attr('src', "{{  asset('images/') }}/"+i);
  };
</script>