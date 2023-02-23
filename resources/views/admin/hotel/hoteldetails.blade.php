
{!! Form::open(['action' => ['SettingController@update', $h->id],'method' => 'POST','id' => 'gago']) !!}

	<div class="row">
		<div class="col-md-6">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Hotel Details</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="card-body" style="display: block;">
					<div class="form-group">
						<label for="inputName">Hotel Name</label>
						<input type="text" id="name" name="name" value="{{$h->name}}" class="form-control" >
					</div>
					<div class="form-group">
						<label for="inputName">Hotel Address</label>
						<input type="text" id="address" name="address" class="form-control"  value="{{$h->address}}">
					</div>
					<div class="form-group">
						<label for="inputName">Hotel Email</label>
						<input type="email" id="email" name="email" class="form-control"  value="{{$h->email}}">
					</div>
					<div class="form-group">
						<label for="inputName">Price / Night</label>
						<input type="number" id="price" name="price" class="form-control"  value="{{$h->price}}">
					</div>
					<div class="form-group">
						<label for="inputName">Distance from City (km)</label>
						<input type="number" step="0.01" id="distance" name="distance" class="form-control"  value="{{$h->distance}}">
					</div>
					<div class="form-group">
						<label for="inputName">Meals (included)</label>
						<div class="custom-control custom-checkbox">
							<input class="custom-control-input" type="checkbox" id="break_fast" name="meal[]" value="Breakfast"@if(count($meal)>0) @foreach($meal as $m)  @if($m->meals=="Breakfast") checked="" @endif @endforeach @endif >
							<label for="break_fast" class="custom-control-label">Breakfast</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input class="custom-control-input" type="checkbox" id="lunch" name="meal[]" value="Lunch" @if(count($meal)>0) @foreach($meal as $m)  @if($m->meals=="Lunch") checked="" @endif @endforeach @endif>
							<label for="lunch" class="custom-control-label">Lunch</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input class="custom-control-input" type="checkbox" id="dinner" name="meal[]" value="Dinner" @if(count($meal)>0) @foreach($meal as $m)  @if($m->meals=="Dinner") checked="" @endif @endforeach @endif>
							<label for="dinner" class="custom-control-label">Dinner</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card card-secondary ">
				<div class="card-header">Advance Features
					<div class="card-tools ">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="card-body " style="display: block;">
					<div class="col-md-12  d-flex align-items-center justify-content-center " >
						<img src='{{asset("images/$h->image")}}' id="preview_1" width="200px"  />
					</div>
					<div class="form-group">
						<label >Hotel Image</label>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="h_image" name="h_image" onchange="loadFile(event);" >
								<label class="custom-file-label" for="l_image" id="l_image" >{{$h->image}}</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputDescription">Hotel Description</label>
						 <textarea  id="description" name="description" class="form-control" rows="4" >{{$h->description}}
						 </textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<a href="#" class="btn btn-secondary">Cancel</a>
				<input type="submit"  value="Update" class="btn btn-success float-right">
			</div>
		</div>

	{{Form::hidden('_method','PUT')}} {!!Form::close()!!}
	{!! Form::close() !!}

<script>
  var loadFile = function(event) {
    var output = document.getElementById('preview_1');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
	<script >
  $('#h_image').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#h_image')[0].files[0].name;
  $('#l_image').text(file);
});
</script>