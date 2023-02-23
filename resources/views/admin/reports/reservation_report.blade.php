
<?php
use App\tempReps;
DB::table('temp_reps')->delete();
?>
   
@extends('layouts.adminlayout')
@section('content')
  
    
     <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Reservation Report</h1>
                  </div>
                  <div class="col-sm-6">
                    
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            <section class="content">
              <div class="container-fluid">
                <form method="post" action="{{ action('ReservationReport@store') }}"> 
                  <input type="hidden" name="start" id="start" value="{{ session('start') }}" >
                    <input type="hidden" name="ends" id="ends" value="{{ session('ends') }}">
                  @csrf
                <div class="card">
                  <div class="card-body">
                         <div class="col-md-12">
                   <div class="row">
                    <div class="col-sm-2">
                       <div class="form-group clearfix">                                                                     
                        <div class="icheck-info d-inline">
                          <input type="checkbox" id="chckall" name="chckall" onclick="return selector('select[]')">
                          <label for="chckall"class="text-info"> All</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                       <div class="form-group clearfix">
                      <div class="icheck-warning d-inline">
                        <input type="checkbox" id="pending" name="select[]" value="Pending" 
                        @if(session('status') >0) 
                        @foreach( session('status') as $status) @if($status == "Pending" )
                        checked="" 
                        @endif   
                         @endforeach
                         @endif onclick="order()">
                        <label for="pending"class="text-warning"> Pending
                        </label>
                      </div>
                    </div>
                    </div>

                     <div class="col-sm-2">
                       <div class="form-group clearfix">
                        <div class="icheck-success d-inline">
                          <input type="checkbox" id="confirmed" name="select[]" value="Confirmed"
                          @if(session('status') >0) 
                        @foreach( session('status') as $status) @if($status == "Confirmed" )
                        checked="" 
                        @endif   
                         @endforeach
                         @endif onclick="order()">
                          <label for="confirmed"class="text-success"> Confirmed</label>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-2">
                       <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkin" name="select[]" value="Checkin" 
                          @if(session('status') >0) 
                        @foreach( session('status') as $status) @if($status == "Checkin" )
                        checked="" 
                        @endif   
                         @endforeach
                         @endif onclick="order()">
                          <label for="checkin"class="text-primary"> Checkin</label>
                        </div>
                      </div>
                    </div>


                    <div class="col-sm-2">
                       <div class="form-group clearfix">
                        <div class="icheck-dark d-inline">
                          <input type="checkbox" id="checkout" name="select[]" value="Checkout"
                          @if(session('status') >0) 
                        @foreach( session('status') as $status) @if($status == "Checkout" )
                        checked="" 
                        @endif   
                         @endforeach
                         @endif onclick="order()">
                          <label for="checkout"class="text-dark"> Checkout</label>
                        </div>
                      </div>
                    </div>

                       <div class="col-sm-2">
                       <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                          <input type="checkbox" id="cancelled" name="select[]" value="Cancelled"
                          @if(session('status') >0) 
                        @foreach( session('status') as $status) @if($status == "Cancelled" )
                        checked="" 
                        @endif   
                         @endforeach
                         @endif onclick="order()">
                          <label for="cancelled"class="text-danger"> Cancelled</label>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                <div class="col-md-12" id="reserv" style="display: none">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation" name="reservation" autocomplete="off">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                  </div>
                </div>
                </div>
                  </div>
             
                </div>
                </form>
                

              </div>
            </section>

     
    <section class="content ">
      <div class="card">
            
              <div class="card-body ">
               
                
                <table  class="table table-hover table-striped table-bordered text-sm  "> 
                  <thead>
                  <tr>
                    <th width="5px">No.</th>
                    <th >Guest</th>
                    <th>Res.Date</th>
                    <th>Accomodation</th>
                    <th>Night</th>
                    <th>Room Qty.</th>
                    <th>Amount</th>
                    
                    <th>Status</th>
                 
                 
                  </tr>
                </thead>
                <tbody>

                @php
                  $i=1;
                @endphp
                   @foreach($res_all as  $res) 
                    @foreach($rooms as $r)
                    @foreach($customer as $c)
                    @if(session('status') >0)
                    @foreach(session('status') as $status)
                     @php

                      
                      $date=new DateTime($res->created_at);
                      $date=$date->format('m/d/Y');

                      $date=strtotime($date);

                     @endphp

                      @if($res->room_id==$r->id && $res->cus_id == $c->id  && $res->book_status==$status && $date >= strtotime(session('start'))  && $date <= strtotime(session('ends')))
                          
                       @php
                       $str="";
                       $str=($c->lname." ,".$c->fname."");

                       $report= new tempReps;

                       $report->Guest=$str;
                       $report->Accomodation=$r->room_type;
                       $report->ResDate=$res->created_at;
                       $report->Night=$res->night;
                       $report->RoomQty=$res->qty;
                       $report->ammount=number_format($res->total);
                       $report->status=$res->book_status;
                       $report->save();
                      

                  
                  $b=0;
                  $qty=0;
                  $total=0;
                  $id=[];
                 @endphp
                 <tr>
                   <td>{{ $i }} </td>
                   <td><a href="" data-toggle="modal" data-target="#cus-info{{ $res->id }}"><span class=" text-bold">{{ $c->lname }}</span></a> , {{ $c->fname }}</td>
                   <td>{{ $res->created_at }}</td>
                   <td>{{ $r->room_type }}</td>
                   <td>{{ $res->night }}</td><input type="hidden" name="night" value={{ $res->night }}><input type="hidden" name="h_id" value="{{ $res->h_id }}">
                  
                   <td>{{ $res->qty }} </td><input type="hidden" name="qty" value="{{ $qty }}">
                   <td>₱ {{ number_format($res->total) }}</td><input type="hidden" name="total" value="{{ $total }}">
                    <input type="hidden" name="c_type" value="{{ $c->c_type }}">
                   <td>@if($res->book_status=="Pending") <span class="badge badge-warning">{{ $res->book_status }}</span>  @endif
                    @if($res->book_status=="Confirmed") <span class="badge badge-success">{{ $res->book_status }}</span>  @endif
                      @if($res->book_status=="Checkin") <span class="badge badge-primary">{{ $res->book_status }}</span>  @endif
                    @if($res->book_status=="Checkout") <span class="badge badge-secondary">{{ $res->book_status }}</span>  @endif
                     @if($res->book_status=="Cancelled") <span class="badge badge-danger">{{ $res->book_status }}</span>  @endif
                     </td><input type="hidden" name="book_date" value="{{ $res->created_at }}">
                    
                 </tr>
                 
                 <input type="hidden" name="cus_id" value="{{ $res->cus_id }}">
      
                 @php
                  $i++;
                 @endphp
                 <div class="modal fade  " id="cus-info{{ $res->id }}">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header p-0 border-0 ">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="fa fa-times-circle"></i>
                        </button>
                      </div>
                      <div class="modal-body text-sm">
                        <div class="col-sm-12">
                          <div class="row">
                            <div class="col-md-6 text-center">
                               <label class="text-lg">Customer Profile</label>
                              <div class="card">

                               <div class="card-body text-left">
                                
                                  <label class="col-md-12"><i class="fa fa-user"></i> Name : <span class="text-secondary">{{ $c->fname }} , {{ $c->lname }}</span></label>
                                  <label class="col-md-12"><i class="fa fa-at"></i> Email : <span class="text-secondary">{{ $c->email }}</span></label>
                                  <label class="col-md-12"><i class="fa fa-mobile"></i> Phone : <span class="text-secondary">{{ $c->contact_no }}</span></label>
                                 <hr  style="height: 10px;color: green">
                                <label class="col-md-12">Cardholder's name : <span class="text-secondary">{{ $c->ch_name }}</span></label>
                                 <label class="col-md-12">Card type : <span class="text-secondary">{{ $c->c_type }}</span></label>
                                  <label class="col-md-12">Card number : <span class="text-secondary">{{ $c->c_number }}</span></label>
                               </div>
                              </div>
                            </div>
                             <div class="col-md-6 text-center">
                              @if($res->book_status=="Pending")
                               <label class="text-lg text-warning">{{ $res->book_status }}</label>
                               @elseif($res->book_status=="Confirmed")
                               <label class="text-lg text-success">{{ $res->book_status }}</label>
                               @elseif($res->book_status=="Checkin")
                                <label class="text-lg text-primary">{{ $res->book_status }}</label>

                                @elseif($res->book_status=="Checkout")
                                <label class="text-lg text-secondary">{{ $res->book_status }}</label>
                                @elseif($res->book_status=="Cancelled")
                                <label class="text-lg text-danger">{{ $res->book_status }}</label>
                               @endif
                              <div class="card">

                               <div class="card-body text-left">
                                <div class="col-md-12 row text-sm">
                                  <label class="col-md-6"><span class="text-success"><i class="fa fa-calendar-check"></i> {{ date('D j M Y',strtotime($res->check_in)) }}</span></label> 
                                  <label class="col-md-6"><span class="text-danger"><i class="fa fa-calendar-times"></i> {{ date('D j M Y',strtotime($res->check_out)) }}</span></label>
                                </div>
                                 <div class="col-md-12">
                                   <label><span><i class="fas fa-moon text-primary"></i> {{ $res->night }} nights</span></label>
                                 </div>
                                
                                       <div class="card-body">
                                   <div class="row">
                                     <div class="col-md-4" style='background-image: url({{ asset("images/".$r->room_image) }});background-size: 100% 100%;height: 50px'>
                                       
                                     </div>
                                     <div class="col-md-8 " style="margin-top: 10px">
                                       <a href="" data-toggle="modal" data-target="#room{{ $r->id }}"><label style="cursor: pointer"><span class="text-secondary">{{ $res->qty }}x</span> <span class=" text-success">
                                      
                                        {{ $r->room_type }}
                                      
                                      </span></label></a>
                                     </div>
                                   </div>
                                 </div>
                               
                                <div class="col-sm-12">
                                  <label class="text-secondary">Total : <span class="text-green"> ₱ {{ number_format($res->total) }}</span></label>

                                </div>
                               </div> 
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="col-md-6">
                                  <label class="text-lg"><i class="fa fa-suitcase"></i> Booking Summary</label>
                                </div>
                               <div  style="display: table;" class="table-bordered table table-bordered ">
                                 <div style="display: table-row;" class="text-bold">
                                
                                   <div style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">Accomodation</div>
                                   <div style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">Book date</div>
                                   
                                    <div  style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">Night</div>
                                    <div style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">Checkin</div>
                                    <div style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">Checkout</div>
                                    <div style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">Total</div>
                                    <div style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">Status</div>
                                  </div>
                                    @foreach($rooms as $r)
                                 @foreach($alls as $all)
                                  @if($res->cus_id==$all->cus_id && $r->id == $all->room_id ) 
                                  <div style="display: table-row;" class="text-xs">
                                
                                   <div class="text-bold"  data-toggle="modal" data-target="#room{{ $r->id }}" style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px;cursor: pointer"><i class="fa fa-hand-o-right text-success"></i> {{ $all->qty }}x  {{ $r->room_type }}</div>
                                      <div style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">{{ $all->created_at }}</div>
                                    
                                    <div  style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">{{ $all->night }}</div>
                                    <div style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">{{ date('D j M Y',strtotime($all->check_in)) }}</div>
                                    <div style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">{{ date('D j M Y',strtotime($all->check_out)) }}</div>
                                    <div style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">₱ {{ number_format($all->total) }}</div>
                                    <div style="display: table-cell;border: solid #dee2e6;border-width: 1px;padding: 10px">{{ $all->book_status }}</div>
                                  </div>

                                    @endif
                                   @endforeach
                                   @endforeach
                              
                                 
                               </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                 @endif
                 @endforeach
                 @endif
                  @endforeach
                 @endforeach
                @endforeach
              </tbody>
              </table>
              <div class="col-md-12 " style="margin-top: 20px " >
                <a href="{{ url('print') }}" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
                <a href="{{ url('export') }}" class="btn btn-primary float-right"><i class="fa fa-download"></i> Generate EXCEL</a>
              </div>
            </div>
          </div>
        </section>

  @foreach($rooms as $r)
  <div class="modal fade "   id="room{{$r->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header p-0 border-0">
              <label class="modal-title " style="padding-left: 20px">{{$r->room_type}}</label> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times-circle"></i>
              </button>
            </div> 
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                   <div class=""  style='background-image: url({{asset("images/$r->room_image")}});background-size: 100% 100%;height: 250px'>
                        
                      </div>
                   <div class="col-sm-12  ">
                          <label class="text-success bold">₱ {{ number_format($r->room_price) }} for 1 night</label>
                        </div>
                        <div class="col-sm-12">
                          <label class="" ><span class="badge " style="border:solid black;border-width: 1px" >Max Person : <span class="badge badge-info">{{ $r->room_person}}</span> (included) 1 child</span></label>
                        </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-12">
                      @foreach($am as $amen)
                        
                          @if($r->id==$amen->room_id)
                          @foreach($amenities as $key)
                            @if($key->id == $amen->amenities_id)
                          
                            <span class=" badge badge-lg text-success " style="border:solid black;border-width: 1px" ><i class="outline">{{$key->amenities}}<i></span>
                              @endif
                              @endforeach
                              @endif
                         
                      @endforeach
                    </div>
                    <div class="col-sm-12">
                      <p class="text-justify">
                        Air-conditioned room features a flat-screen cable TV, iPod dock and safe. A seating area and private bathroom with shower, haidryer and free toiletries are included.
                          <br>
                        Guests have access to the Executive Club Lounge.

                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
 



  @endforeach
  <script type="text/javascript">
        function selector(select){
         
            if(document.getElementById('chckall').checked==true){

             var el=document.getElementsByName(select);
             
             for (var i = 0 ; i< el.length;i++){
                  el.item(i).checked=true;;
                 
             }

             
        
            }else{
              var el=document.getElementsByName(select);
             
             for (var i = 0 ; i< el.length;i++){
                  el.item(i).checked=false;;
                 
             }

            }
   
             var c=0;
          var el=document.getElementsByName('select[]');
           for (var i = 0 ; i< el.length;i++){
                 if(el.item(i).checked==true){
                  c=1;
                 
                 }
                 if(c==0){
                  $('#reserv').hide();
                 }else{
                   $('#reserv').show();
                 }
                 
             }
          }



      </script>
      <script type="text/javascript">
        function order(){
          var c=0;
          var el=document.getElementsByName('select[]');
           for (var i = 0 ; i< el.length;i++){
                 if(el.item(i).checked==true){
                  c=1;
                 
                 }
                 if(c==0){
                  $('#reserv').hide();
                  document.getElementById('chckall').checked=false;
                 }else{
                   $('#reserv').show();
                 }
                 
             }
        }
        

      </script>
<script type="text/javascript">
  $('#srep').addClass('active menu-open');
  $('#sresrep').addClass('active ');
</script>
  @endsection