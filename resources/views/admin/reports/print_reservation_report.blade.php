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

       <h1><i>Reservation Report</i></h1>
        
      
    </div>
    
   </div>
 </section>

    <div class="row">
      <!-- accepted payments column -->
     
      <!-- /.col -->
      <div class="col-12">
       

        <div class="table-responsive">
          <table class="table table-bordered">
           <tr>
             <th>No.</th>
             <th>Guest</th>
             <th>Res.Date</th>
             <th>Accommodation</th>
             <th>Night</th>
             <th>Room Qty.</th>
             <th>Amount</th>
             <th>Status</th>
           </tr>
           <tbody>
            <?php
            $i=1;
            ?>
            @foreach($report as $r)
             <tr>
               <td>{{ $i }}</td>
               <td>{{ $r->Guest }}</td>
               <td>{{ $r->ResDate }}</td>
               <td>{{ $r->Accomodation }}</td>
               <td>{{ $r->Night }}</td>
               <td>{{ $r->RoomQty }}</td>
               <td>₱ {{$r->ammount}}</td>
               <td>{{ $r->status }}</td>
             </tr>
             @php
             $i++;
             @endphp
             @endforeach
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
