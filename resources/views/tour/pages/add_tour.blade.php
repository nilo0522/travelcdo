  @extends('layouts.tour_layout')
@section('content')
<!--  <section class="content-header">
	
</section>
 <section class="content">
    <div class="container-fluid">
    	
    		
  <div class="col-12 col-sm-6 col-lg-12">
            <div class="card card-primary">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="highlights-tab" data-toggle="pill" href="#highlights" role="tab" aria-controls="highlights" aria-selected="true">Highlights</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="exp-tab" data-toggle="pill" href="#exp" role="tab" aria-controls="exp" aria-selected="true">Experience</a>
                  </li>
               
               
                 
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                   <div class="card">
                   	<div class="card-body">
                   		<form>
                   		<div class="col-lg-12">
                   			<div class="row">
                   				<div class="col-md-6">
                   					<div class="row">
                   						<div class="col-12">
                   							<div class="form-group">
                   								<label>Tour Name</label>
                   								<textarea class="form-control text-bold" name="name"></textarea>
                   							</div>
                   							<div class="form-group">
                   								<label>Address</label>
                   								<input type="text" name="address" class="form-control">
                   							</div>
                   							<div class="form-group">
                   								<label>Type</label>
                   								<select  name="type" class="form-control">
                   									<option selected="" disabled="">--Seclect--</option>
                   									<option value="Sports">Sports</option>
                   									<option value="Sightseeing">Sightseeing</option>
                   									<option value="Tour">Tour</option>
                   								</select>
                   							</div>

                   						</div>
                   					</div>
                   				</div>
                   				<div class="col-md-6">
                   					<div class="card-body " style="display: block;">
                   						<div class="col-md-12  d-flex align-items-center justify-content-center " >
                   							<img  id="preview_2" width="200px" required />
                   						</div>
                   						<div class="form-group">
                   							<label for="exampleInputFile">Tour Image</label>
                   							<div class="input-group">
                   								<div class="custom-file">
                   									<label class="custom-file-label" for="h_image"></label>
                   									<input type="file" class="custom-file-input" id="t_image" name="t_image"   onchange="preview(this);">
                   								</div>
                   							</div>
                   						</div>
                   					</div>
                   				</div>
                   			</div>
                   			<div class="col-lg-12">
                   				<button type="submit" class="btn btn-primary float-right"> Continue</button>
                   			</div>
                   		</div>
                   		<input type="hidden" name="det" value="profile">
                   	</form>
                   	</div>
                   </div> 
                  </div>
                  <div class="tab-pane fade" id="highlights" role="tabpanel" aria-labelledby="highlights-tab">
                   	<div class="col-lg-12">
                   		<form action="">
                   		<div class="row">
                   			<div class="col-md-6">
                   				<label class="col-lg-12">
                   						Highlights
                   					</label>
                   				<div class="col-lg-12" id="items">
                   					
                   					<div class="form-group">
                   						<textarea class="form-control" name="high[]" id="high"></textarea>
                   					</div>
                   					
                   				</div>
                   				<div class="col-lg-12 text-center p-2">
                   					<a  id="add" class="btn btn-primary col-3 text-bold"><i class="fa fa-plus"></i> Add</a>
                   				</div>
                   				
                   			</div>
                   			<div class="col-md-6">
                   				<div class="row">
                   					<div class="col-lg-12">
                   						<label><i class="fa fa-smile"></i> Good For:</label>
                   						<div class="row" id="items2">
                   							<div class="form-group col-lg-12">
                   								<input type="text" name="goodfor[]" class="form-control">
                   							</div>
                   						</div>
                   						
                   					</div>
                   					<div class="col-lg-12 text-center">
                   						<a href="#" id="add2" class="btn-primary btn "> <i class="fa fa-plus"></i> Add</a>
                   					</div>
                   				</div>
                   			</div>
                   			
                   		</div>
                   		<div class="form-group col-lg-12">
                   			<button type="submit" class="btn btn-primary float-right"> Continue</button>
                   		</div>
                   	</form>
                   	</div>
                   </div>tab panel
            
                   <div class="tab-pane fade" id="exp" role="tabpanel" aria-labelledby="exp-tab">
                   	<form>
                   	<div class="card">
                   		<div class="card-body">
                   			<div class="form-group">
                   				<label>What You’ll Experience</label>
                   				<textarea class="form-control" name="exp"></textarea>
                   			</div>
                   			<div class="form-group">
                   				<button type="submit" class="btn btn-primary"> Submit</button>
                   			</div>
                   		</div>
                   	</div>
                   </form>
                   </div>
                 
                  
                
                </div>
              </div>
              
             
            </div>
          </div>
    	
    	
    </div>
    </section>-->

<section class="content-header">
  <h3>Add New Tour</h3>
</section>
 <div class="content">
   <div class="container-fluid">
     <div class="card">
       <div class="card-body">
        <form method="post" action="{{ action('TourManage@store') }}">
          @csrf
         <div class="col-md-12">
           <div class="row">
             <div class="col-md-4">
              <label for="exampleInputFile">Tour Image</label>
                <div class="col-md-12  d-flex align-items-center justify-content-center " >
                  <img  id="preview_2" width="200px" required />
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="custom-file">
                      <label class="custom-file-label" for="h_image"></label>
                      <input type="file" class="custom-file-input" id="t_image" name="t_image"   onchange="preview(this);">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-label">
                    Tour Name
                  </label>
                  <textarea  name="t_name" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label class="form-label">
                    Tour Address
                  </label>
                  <input type="text" name="t_address" class="form-control">
                </div>
              
                 <div class="form-group">
                  <label class="form-label">
                    Tour Price
                  </label>
                  <input type="text" name="t_price" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                   <label class="form-label">
                     What will Experience
                   </label>
                   <textarea  name="des" class="form-control"></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-success float-right"> Save</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection