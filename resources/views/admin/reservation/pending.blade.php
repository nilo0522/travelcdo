
@extends('layouts.adminlayout')
@section('content')

    
     <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Pending</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                      <li class="breadcrumb-item active">Reservation/Pending</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>
     

    <section class="content ">
      <div class="card">
        <div class="card-header">
              <h3 class="card-title"><b>LIST OF PENDING RESERVATION</b></h3>

            </div>
              <div class="card-body">
               
                
                <table id="tbl" class="table table-hover table-striped text-sm"> 
                  <thead>
                  <tr>
                    <th width="5px">No.</th>
                    <th >Guest</th>
                    <th>Res.Date</th>

                    <th>Night</th>
                    <th>Room Qty.</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th style="text-align: center">Action</th>
                  </tr>
                </thead>
                <tbody>
                 @php
                  $i=1;
                  
                 
                  $id=[];
                 @endphp
                   @foreach($res as $res) 
                    @foreach($rooms as $r)
                    @foreach($customer as $c)
                      @if($res->room_id==$r->id && $res->cus_id == $c->id && $res->book_status=="Pending")
                    <form method="post" action="{{ action('AdminReservationController@store') }}">
                        @csrf
                     
                     @php
                      $qty=0;
                  $total=0;
                     @endphp 
                 <tr>
                   <td>{{ $i }}</td>
                   <td><a href="" data-toggle="modal" data-target="#cus-info{{ $res->id }}"><span class=" text-bold">{{ $c->lname }}</span></a> , {{ $c->fname }}</td>
                   <td>{{ $res->created_at }}</td>
                   
                   <td>{{ $res->night }}</td><input type="hidden" name="night" value={{ $res->night }}><input type="hidden" name="h_id" value="{{ $res->hotel_id }}">
                   @foreach($res_all as $all)
                    @if($all->created_at == $res->created_at && $all->book_status=="Pending") 
                       @php 
                       $qty+=$all->qty;
                       $total+=$all->total;
                        
                        @endphp
                    
                      
                      @endif @endforeach
                   <td>{{ $qty }} </td><input type="hidden" name="qty" value="{{ $qty }}">
                   <td>₱ {{ number_format($total) }}</td><input type="hidden" name="total" value="{{ $total }}">
                    <td>{{ $c->c_type }}</td><input type="hidden" name="c_type" value="{{ $c->c_type }}">
                   <td>@if($res->book_status=="Pending") <span class="badge badge-warning">{{ $res->book_status }}</span>  @endif
                    @if($res->book_status=="Confirmed") <span class="badge badge-success">{{ $res->book_status }}</span>  @endif
                     </td><input type="hidden" name="book_date" value="{{ $res->created_at }}">

                   <td align="center">
                    <div class="btn-group">
                      <button type="submit"  class="btn btn-xs btn-success"><i class="fa fa-check ">Confirm</i> </button><a href="{{ url('admin/reservation-manage/'.$c->id) }}" class="btn btn-xs btn-info"><i class="fa fa-tasks"></i> Manage</a>
                    </div></td>
                 </tr>
                 <input type="hidden" name="cus_id" value="{{ $res->cus_id }}">
               </form>
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
                               <label class="text-lg text-warning">{{ $res->book_status }}</label>
                              <div class="card">

                               <div class="card-body text-left">
                                <div class="col-md-12 row text-sm">
                                  <label class="col-md-6"><span class="text-success"><i class="fa fa-calendar-check"></i> {{ date('D j M Y',strtotime($res->check_in)) }}</span></label> 
                                  <label class="col-md-6"><span class="text-danger"><i class="fa fa-calendar-times"></i> {{ date('D j M Y',strtotime($res->check_out)) }}</span></label>
                                </div>
                                 <div class="col-md-12">
                                   <label><span><i class="fas fa-moon text-primary"></i> {{ $res->night }} nights</span></label>
                                 </div>
                                 @foreach($rooms as $r)
                                 @foreach($res_all as $all)
                                  @if($all->room_id==$r->id && $all->cus_id == $res->cus_id && $all->book_status=="Pending" && $all->created_at==$res->created_at) 
                                       <div class="card-body">
                                   <div class="row">
                                     <div class="col-md-4" style='background-image: url({{ asset("images/".$r->room_image) }});background-size: 100% 100%;height: 50px'>
                                       
                                     </div>
                                     <div class="col-md-8 " style="margin-top: 10px">
                                       <a href="" data-toggle="modal" data-target="#room{{ $r->id }}"><label style="cursor: pointer"><span class="text-secondary">{{ $all->qty }}x</span> <span class=" text-success">
                                        @foreach($rooms as $room)
                                        @if($all->room_id==$room->id && $all->book_status=="Pending")
                                        {{ $room->room_type }}
                                        @endif
                                        @endforeach
                                      </span></label></a>
                                     </div>
                                   </div>
                                 </div>
                                  @endif @endforeach @endforeach
                                <div class="col-sm-12">
                                  <label class="text-secondary">Total : <span class="text-green"> ₱ {{ number_format($total) }}</span></label>

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
                 @endforeach
                @endforeach
                               
                </tbody>


                      </table>
                      
                     
                    
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
  $('#manageres').addClass('active menu-open');
  $('#spend').addClass('active ');
</script>
  @endsection