

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="{{asset('Fileinput/css/normalize.css')}}" >	
  	<link rel="stylesheet"  href="{{asset('Fileinput/css/component.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
   
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
   
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/ekko-lightbox/ekko-lightbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/image.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
    
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
      <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
       <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
       <script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
  </head>
  <body class="hold-transition  layout-navbar-fixed layout-fixed layout-footer-fixed text-sm" >
    <div class="wrapper">
    
      @include('admin.header')
      @include('admin.sidebar')
      <div class="content-wrapper ">
        @yield('content')
      </div>
      <aside class="control-sidebar control-sidebar-dark">
        <div class="col-md-12">
          <form method="post" action="{{ url('admin-user/'.Auth::user()->id) }}">
            @csrf
            @method('put')
              <div class="card-body box-profile">
                <div class="text-center">
                 
                  <img style="cursor: pointer" id="u_image" class="profile-user-img img-fluid img-circle" src="{{ asset('images/'.Auth::user()->image) }}" alt="User profile picture" >
                    <input type="file" name="p_image" id="p_image" style="display: none" value="{{Auth::user()->image }}">
                </div>

                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                <p class=" text-center text-bold">Admin</p>

               <div class="form-group">
                 <label>Name :</label>
                 <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
               </div>
                <div class="form-group">
                 <label>Email :</label>
                 <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
               </div>
                 <div class="form-group">
                 <label>Password :</label>
                 <input type="password" name="password" class="form-control" value="{{ Auth::user()->password }}">
               </div>
                <button type="submit" class="btn btn-info btn-block"><b>Update</b></button>
              </div>
              <!-- /.card-body -->
            
          </form>
        </div>
  </aside>
    @include('admin.footer')
    @include('inc.messages')
  </div>
  <script type="text/javascript">
    $('#u_image').click(function(e){
      $('#p_image').trigger('click');
    })
  </script>
  <script>
    $(function () {
      
      $('.select2').select2();
      $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', 
        $(this).prop('checked'));
    });
    });
  </script>

  <script>

    $('#tblr').DataTable();
  </script>

 



<script type="">
  $('#r_image').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#r_image')[0].files[0].name;
  $(this).prev('label').text(file);
});
</script>
<script type="">
  $('#h_gallery').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#h_gallery')[0].files[0].name;
  $(this).prev('label').text(file);
});
</script>

  <script type="text/javascript">
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              
              reader.onload = function (e) {
                  $('#u_image').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $("#p_image").change(function(){
          readURL(this);
      });
  </script>


 <!-- 
    <script type="text/javascript">
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              
              reader.onload = function (e) {
                  $('#preview_1').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $("#h_image").change(function(){
          readURL(this);
      });
  </script>-->

  <script type="text/javascript">
    function fas(){

      if(document.getElementById('facilities').val==""){

        return false;
      }
    }
  </script>
  <script type="text/javascript">
    
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });

  </script>
  <script type="text/javascript">
   var modal_lv = 0;
$('.modal').on('shown.bs.modal', function (e) {
    $('.modal-backdrop:last').css('zIndex',1051+modal_lv);
    $(e.currentTarget).css('zIndex',1052+modal_lv);
    modal_lv++
});

$('.modal').on('hidden.bs.modal', function (e) {
    modal_lv--
});
  </script>

  <script>
  $(function () {
 

    //Date range picker
   
        $('#reservation').daterangepicker({
          
          autoUpdateInput: false,
          
          locale: {
            cancelLabel: 'Clear'
          },
          
   
        });
    //Date range picker with time picker
   
   

        $('#reservation').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
          $('input[name="start"]').val(picker.startDate.format('MM/DD/YYYY'));
          $('input[name="ends"]').val(picker.endDate.format('MM/DD/YYYY'));
        });

        $('#reservation').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
        });

   
  })
</script>
     
  
  </body>
</html> 
