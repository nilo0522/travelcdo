  @extends('layouts.tour_layout')
@section('content')
	<section class="content-header">
		
	</section>
	<div class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-body">
					<table class="table">
						<tr>
							<th>#</th>
							<th>Image</th>
							<th>Tour Name</th>
							<th>Price</th>
							<th class="text-right">Action</th>
						</tr>
						<tbody>

							@foreach($tour as $t)
							<tr>
								<td>{{ $t->id }}</td>
								<td><img src="{{ asset('images/'.$t->image) }}" style="height: 30px"></td>
								<td>{{ $t->t_name }}</td>
								<td>{{ $t->t_price }}</td>
								<td class="text-right"><div class="btn-group text-left">
					                   
					                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
					                      <span class="caret"></span>
					                      <span class="sr-only">Toggle Dropdown</span>
					                    </button>
					                    <div class="dropdown-menu dropdown-menu-right " role="menu">
					                      <a class="dropdown-item " href="{{ url('tour-highlights/'.$t->id) }}"><span class="badge badge-primary">Highlights</span></a>
					                      <a class="dropdown-item " href="{{ url('tour-itinerary/'.$t->id) }}"><span class="badge badge-primary">Itinerary</span></a>
					                      <a class="dropdown-item " href="#"><span class="badge badge-primary">Details</span></a>
					                     
					                    </div>
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
@endsection