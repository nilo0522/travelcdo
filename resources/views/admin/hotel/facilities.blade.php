<!--Include in Settings-->


	<div class="row">
	 	<div class="col-md-6">
	 		<div class="card card-primary ">
	 			<div class="card-header">
	 				<i class="fa fa-plus"></i><span></span> Facilities
	 				<div class="card-tools ">
	 					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	 						<i class="fas fa-minus"></i>
	 					</button>
	 				</div>
	 			</div>
	 			<div class="card-body">
	 				{!! Form::open(['action' => 'HotelFacilitiesController@store','method' => 'POST'] ) !!}
	 				<div class="input-group input-group-sm">
	 						
	 					<input type="text" id="facilities" name="facilities" class="form-control">
	 					<span class="input-group-append">
	 						<button type="submit" class="btn btn-info btn-flat"><i class="fa fa-plus" ></i> <span></span> Add
	 						</button>
	 					</span>
	 					

	 				</div>
	 				{!!Form::close()!!}
	 			</div>
	 		</div>
	 	</div>
	 	<div class="col-md-6">
	 		<div class="card card-secondary">
	 			<div class="card-header">
	 				<i class="fa  fa-file-text-o"></i><span></span> List of Hotel Facilities
	 				<div class="card-tools ">
	 					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
	 						<i class="fas fa-minus"></i>
	 					</button>
	 				</div>
	 			</div>
	 			<div class="card-body">

	 				<table class="table table-condensed">
	 					<thead>
	 						<tr>
	 							<th>#</th>
	 							<th>Facilities</th>
	 							<th >Action</th>
	 						</tr>
	 					</thead>

	 					<tbody>
	 						@foreach($facs as $fac )
	 						<tr>
	 						<td>{{$fac->id}}</td>
	 						<td>{{$fac->facilities}}</td>
	 						<td>
	 							<a href="#" data-toggle="modal" data-target="#update{{$fac->id}}"> <i class="fas fa-pen fa-xs text-info"></i></a>
	 							<span class="col-sm-2"></span>
	 							<a href="#" data-toggle="modal" data-target="#del{{$fac->id}}"><i class="fa fa-trash text-danger"></i></a>
	 						</td>
	 						</tr>
	 						    <div style="top: 50px" class="modal fade" id="update{{$fac->id}}">
	 						    	<div class="modal-dialog modal-sm">
	 						    		<div class="modal-content">
	 						    			<div class="modal-header p-1 bg-dark" >
	 						    				<div class="col-sm-12 text-center">
	 						    					<label  >Update Facilities</label>
	 						    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	 						    				 <span aria-hidden="true">&times;</span>
	 						    				  </button>
	 						    				</div>
	 						    				
	 						    				</div>
	 						    				<div class="modal-body">
	 						    						<div class="card-body">
	 				{!! Form::open(['action' => ['HotelFacilitiesController@update',$fac->id],'method' => 'POST'] ) !!}
	 				<div class="input-group input-group-sm">
	 						
	 					<input type="text" id="facilities" name="facilities" class="form-control" value="{{$fac->facilities}}">
	 					<span class="input-group-append">
	 						<button type="submit" class="btn btn-info btn-flat"><i class="fas fa-pen" ></i> <span></span> Update
	 						</button>
	 					</span>
	 					

	 				</div>
	 				@method('put')
	 				{!!Form::close()!!}
	 			</div>
	 						    				</div>
	 						    				
	 						    			</div>
	 						    		</div>
	 						    	</div>
	 						<div style="top: 50px" class="modal fade" id="del{{$fac->id}}">
	 						    	<div class="modal-dialog modal-sm">
	 						    		<div class="modal-content">
	 						    			<div class="modal-header p-1 bg-danger text-center">
	 						    				<div class="col-sm-12 text-center">
	 						    					<label  >Are you sure?</label>
	 						    				<a  class="close" data-dismiss="modal" aria-label="Close">
	 						    				 <i class="fas fa-times-circle"></i>
	 						    				  </a>
	 						    				</div>
	 						    				
	 						    				</div>
	 						    				<div class="modal-body">
	 						    						<div class="card-body">
	 				{!! Form::open(['action' => ['HotelFacilitiesController@destroy',$fac->id],'method' => 'POST'] ) !!}
	 				
	 									
	 					
	 					<label style="color:  #999" class=" text-center">Do you really want to delete these facilities? This process cannot be undone.</label>
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
	 	</div>
	</div><!--row-->
