@extends('layouts.tour_layout')
@section('content')
<section class="content-header">
	
</section>

<div class="content">
	<div class="container-fluid">
		<div class="col-md-12" id="item">
		<div class="card" name="day[]">
			<div class="card-header"  > Day 1</div>
				<div class="card-body">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>From:</label>
									<div class="input-group date" id="timepicker" data-target-input="nearest">
										<input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/>
										<div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="far fa-clock"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>To:</label>
									<div class="input-group date" id="_timepicker" data-target-input="nearest">
										<input type="text" class="form-control datetimepicker-input" data-target="#_timepicker"/>
										<div class="input-group-append" data-target="#_timepicker" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="far fa-clock"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<a href="#" id=""></a>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<a href="#" id="add" class="btn btn-info"><i class="fa fa-plus"> Add</i> </a>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#add').click(function(e){
			var day=document.getElementsByName('day[]');
			var i=day.length+1;
			var a=day.length-1;
		$('#item').append('		<div class="card" name="day[]"><div class="card-header"  > Day '+i+ ' </div><div class="card-body"><div class="col-md-12"><div class="row"><div class="col-md-3"><div class="form-group"><label>From:</label><div class="input-group date" id="timepicker'+a+'" data-target-input="nearest"><input type="text" class="form-control datetimepicker-input" data-target="#timepicker'+a+'"/><div class="input-group-append" data-target="#timepicker'+a+'" data-toggle="datetimepicker"><div class="input-group-text"><i class="far fa-clock"></i></div></div></div></div></div><div class="col-md-3"><div class="form-group"><label>To:</label><div class="input-group date" id="_timepicker'+a+'" data-target-input="nearest"><input type="text" class="form-control datetimepicker-input" data-target="#_timepicker'+a+'"/><div class="input-group-append" data-target="#_timepicker'+a+'" data-toggle="datetimepicker"><div class="input-group-text"><i class="far fa-clock"></i></div></div></div></div></div><div class="col-md-6"><div class="form-group"><label>Description</label><textarea class="form-control"></textarea></div></div></div></div></div></div>')
	})
</script>

  <script type="text/javascript">
  			var day=document.getElementsByName('day[]');
  			$('#timepicker').datetimepicker({
			      format: 'LT'
			    });
			     $('#_timepicker').datetimepicker({
			      format: 'LT'
			    });
  			for(var i=0; i<=day.length ;i++){
  				$('#timepicker'+i).datetimepicker({
			      format: 'LT'
			    });
			     $('#_timepicker'+i).datetimepicker({
			      format: 'LT'
			    });
			     
  			}
     
  </script>
@endsection