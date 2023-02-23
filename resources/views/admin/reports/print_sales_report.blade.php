<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Travel CDO </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

  <!-- Google Font: Source Sans Pro -->
 
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <img src="{{asset('images/logo.png')}}"> Travel CDO
          <small class="float-right">Date: {{ date('m/d/Y') }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    
    <!-- /.row -->

 <section class="content">
   <div class="container-fluid text-center" >
    <div class="col-sm-12">

       <h1><i>Sales Report</i></h1>
        
      
    </div>
    
   </div>
 </section>

    <div class="row">
      <!-- accepted payments column -->
     
      <!-- /.col -->
      <div class="col-12">
       

        <div class="table-responsive">
          <table class="table ">
           <tr>
              <th>Book Date</th>
                    <th >Guest</th>
                    <th>Invoice/Cntrl</th>
                    <th>Payment Method</th>
                    <th>Total</th>
                    <th>Amount Recieve</th>
           </tr>
           <tbody>
            @php
            $total=0;
            @endphp
            @foreach($inv as $inv)
            <tr>
              <td>{{ $inv->bookdate }}</td>
              <td>{{ $inv->guest }}</td>
              <td>{{ $inv->cntrl }}</td>
              <td>{{ $inv->payment }}</td>
               <td>₱  {{ number_format($inv->total) }}</td>
                <td>₱  {{ number_format($inv->total) }}</td>
                @php
                $total+=$inv->total;
                @endphp
            </tr>
              @endforeach   
              <tr style="border-left: none;border-bottom: none;">
                <td class="text-right text-bold" colspan="5" style="border-left: none;border-bottom: none;"> Total:</td>
                <td class="text-bold text-secondary">₱ {{ number_format($total) }}</td>
              </tr>        
           </tbody>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
