@extends('layouts.adminlayout')
@section('content')


<div class="content-header">
     

     <section class="content">
       <div class="card">
         <div class="card-header" style="background-color:#6c757d">
               <h3 class="card-title text-white">POS</h3>
             <div class="btn-group float-right">
                      <a href="" class="btn btn-sm  bg-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> New</a>
                      <button type="submit" name="delete" class=" btn btn-sm bg-danger"><i class="fa fa-trash"></i> Delete Selected</button>
                     
                     
                      </div>
                    
             </div>
               <div class="card-body">
                 
                 <table id="tblr" class="table table-striped table-bordered" style="width:100%"> 
                   <thead>
                   <tr>
                     <th>
                       No.
                     </th>
                     <th>
                       Description
                     </th>
                     <th>
                       Price
                     </th>

                   </tr>
                 </thead>
                 <tbody>
@php
$i=1;
@endphp                             
                    @foreach($pos as $items)
                 
                 <tr>
                    
                    <td>
                      {{$i++}}
                    </td> 
                    <td>
                      {{$items->description}}
                    </td>
                    <td>₱
                      {{$items->price}} . 00
                    </td>
                 </tr>
                @endforeach
                 
                 </tbody>
 
 
                       </table>
                       
 
 
                     
                      
                    
                    </div>
                  </div>
 
         </section>
 
 
       </div>

  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          {!! Form::open(['action' => 'PosController@store','method' => 'POST']) !!}
          
          <div class="modal-content">
            
            <div class="modal-header">
              <h5 class="modal-title">Create Items</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
             <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" placeholder="Ex. Nescafe" name="des" id="des">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" placeholder="₱" name="price" id="price">
                      </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button  type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
 {!!Form::close()!!}
                                  
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

@endsection