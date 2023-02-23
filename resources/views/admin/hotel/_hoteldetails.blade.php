
<!--STORE-->


{!! Form::open(['action' => 'SettingController@store','method' => 'POST']) !!}

    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Hotel Details</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
              <div class="form-group">
                <label for="inputName">Hotel Name</label>
                <input type="text" id="name" name="name" value="" class="form-control" >
              </div>
              <div class="form-group">
                <label for="inputName">Hotel Address</label>
                <input type="text" id="address" name="address" class="form-control"  value="">
              </div>
              <div class="form-group">
                <label for="inputName">Hotel Email</label>
                <input type="email" id="email" name="email" class="form-control"  value="">
              </div>
              <div class="form-group">
                <label for="inputName">Price / Night</label>
                <input type="number" id="price" name="price" class="form-control"  value="">
              </div>
              <div class="form-group">
                <label for="inputName">Distance from City (km)</label>
                <input type="number" id="distance" name="distance" class="form-control"  value="">
              </div>
              <div class="form-group">
                <label for="inputName">Meals (included)</label>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="break_fast" name="meal[]" value="Breakfast">
                  <label for="break_fast" class="custom-control-label">Breakfast</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="lunch" name="meal[]" value="Lunch">
                  <label for="lunch" class="custom-control-label">Lunch</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="dinner" name="meal[]" value="Dinner">
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
                <button type="button" class="btn btn-tool" data-card-widget="collapse"data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body " style="display: block;">
              <div class="col-md-12  d-flex align-items-center justify-content-center " >
                <img  id="preview_1" width="200px" required />
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Hotel Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <label class="custom-file-label" for="h_image"></label>
                    <input type="file" class="custom-file-input" id="h_image" name="h_image"  onchange="loadFile(event);" >
                    
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputDescription">Hotel Description</label>
                <textarea  id="description" name="description" class="form-control" rows="4" ></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save" class="btn btn-success float-right">
        </div>
      </div>
 
  {!! Form::close() !!}
 