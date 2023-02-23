
<?php
use App\tempsalerep;
DB::table('tempsalereps')->delete();
?>

@extends('layouts.adminlayout')
@section('content')
  
    
     <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Sales Report</h1>
                  </div>
                  <div class="col-sm-6">
                    
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            <section class="content">
              <div class="container-fluid">
                <form method="post" action="{{ action('SalesReportController@store') }}"> 
                  @csrf
                <div class="card">
                  <div class="card-body">
                     <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation" name="reservation" value="" autocomplete="off">
                        <input type="hidden" name="start" id="start" value="{{ session('start') }}" >
                    <input type="hidden" name="ends" id="ends" value="{{ session('ends') }}">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> Search</button>
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
               
                
                <table  class="table table-hover table-striped table-bordered table-sm text-center "> 
                  <thead>
                  <tr>
                    <th>Book Date</th>
                    <th >Guest</th>
                    <th>Invoice/Cntrl</th>
                    <th>Payment Method</th>
                    <th>Total</th>
                    <th>Amount Recieve</th>
                  
                 
                 
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $total=0;
                  @endphp
                  @foreach($invoice as $inv)
                    @foreach($cus as $c)

                    @php
                     $date=new DateTime($inv->book_date);
                      $date=$date->format('m/d/Y');

                      $date=strtotime($date);

                    @endphp
                    
                    @if(session('start')>0)
                    @if($inv->cus_id==$c->id && $date >= strtotime(session('start'))  && $date <= strtotime(session('ends')))
                        @php
                      

                       $str=($c->lname." ,".$c->fname."");

                       $sales= new tempsalerep;
                       $sales->bookdate=$inv->book_date;
                       $sales->guest=$str;
                       $sales->cntrl=$inv->cntrl_no;
                       $sales->payment=$inv->payment;
                       $sales->total=$inv->total;
                       $sales->amountres=$inv->total;
                       $sales->save();

                    @endphp
                   
                        <tr>
                          <td>{{ $inv->book_date }} </td>
                          <td>{{ $c->lname }} , {{ $c->fname }}</td>
                          <td>{{ $inv->cntrl_no }}</td>
                          <td>{{ $inv->payment }}</td>
                          <td>₱  {{ number_format($inv->total) }}</td>
                          <td>₱  {{ number_format($inv->total) }}</td>
                        </tr>
                        @php  
                        $total+= $inv->total;
                        @endphp
                      @endif
                      @endif
                    @endforeach
                  @endforeach
                    <tr>
                      <td colspan="5" class="text-right text-bold">Total :</td>
                      <td class="text-secondary text-bold">₱ {{ number_format($total) }}</td>
                    </tr>
              </tbody>
              </table>
              <div class="col-md-12 p-2">
                
                  <a href="{{ url('print-sales') }}" class="btn btn-primary text-bold"><i class="fa fa-print"></i>  PRINT</a>
                  <a href="{{ url('export-sales') }}" class="btn btn-success text-bold float-right"><i class="fa fa-download"></i>  Generate EXCEL</a>
                
              </div>
             </div>
           </div>
         </section>




 
        <script type="text/javascript">
  $('#srep').addClass('active menu-open');
  $('#ssrep').addClass('active ');
</script>

  @endsection





