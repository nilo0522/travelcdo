 @extends('layouts.tour_layout')
@section('content')
<section class="content-header">
	<h5>Highlights</h5>
</section>
<div class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<form method="post" action="{{ action('TourHighlights@store') }}">
					@csrf
					<input type="hidden" name="id" value="{{ $id }}">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-7">
							<label >Highlights : </label>
							<div class="col-md-12" id="item">
								<div class="form-group">
									<textarea class="form-control" name="high[]"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<a href="#" class="btn btn-info" id="add"> <i class="fa fa-plus"> Add</i></a>
							</div>
						</div>
						<div class="col-md-5">
							<label><i class="fa fa-smile"> Good for:</i></label>
							<div class="col-md-12" id="item2">
								<div class="form-group">
									<input type="text" name="good[]" class="form-control">
								</div>
							</div>
							<div class="col-md-12">
								<a href="#" id="add2" class="btn btn-info"> <i class="fa fa-plus"> Add</i></a>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<button class="btn btn-success float-right" type="submit"> Save</button>
					</div> 
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#add').click(function(e){
		$('#item').append('<div class="form-group"><textarea class="form-control" name="high[]"></textarea></div>')
	})

	$('#add2').click(function(e){
		$('#item2').append('<div class="form-group"><input type="text" name="good[]" class="form-control"></div>')
	})
</script>
@endsection