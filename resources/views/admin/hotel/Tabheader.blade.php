

<div class="card-header p-0 pt-1">
	<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link  {{$active1}}"   href="{{url('admin/settings')}}"  aria-controls="custom-tabs-one-home" aria-selected="false" ><i class="fa fa-file-text-o"></i> <span></span> Hotel Details
			</a>
		</li>
		<li class="nav-item ">
			<a class="nav-link {{$active2}}" id="gallery-tab" data-toggle="pill" href="#gallery" role="tab" aria-controls="gallery" aria-selected="true" ><i class="fa  fa-picture-o"></i><span></span> Gallery
			</a>
		</li>
		<li class="nav-item  ">
			<a class="nav-link {{$active3}}" id="custom-tabs-one-profile-tab" href="{{url('admin/settings-facilities')}}"  aria-controls="custom-tabs-one-profile" aria-selected="true"><i class="fa  fa-building"></i><span></span> Facilities
			</a>
		</li>
	</ul>
</div>