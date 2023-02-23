   
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: auto;">
  <a href="#" class="brand-link">
    <img src="{{asset('images/logo.png')}}" alt="Admin Logo" class="brand-image img-circle elevation-3"  style="opacity: .8">
      <span class="brand-text font-weight-light">TravelCDO</span>
  </a>
    <div class="sidebar" >
      <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
        <div class="image">
          <img src="{{ asset('images/'.Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
        </div>
       <div class="info">
          <a href="#" data-widget="control-sidebar" data-slide="true"     class="d-block">{{ Auth::user()->name }}
          </a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="{{url('admin')}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview " id="managerooms">
            <a href="" class="nav-link  ">
              <i class="nav-icon fa fa-bed"></i>
              <p>
                <b>Manage Rooms</b>
               
               
      
                <span class="badge badge-info right"></span>
              
               <i class="fa fa-angle-left right"></i>
              </p>
            </a>

              <ul class="nav nav-treeview">
              
               <li class="nav-item">
                      <a  class="nav-link "  href="{{ url('admin/rooms') }}" id="viewrooms">
                        <i class="nav-icon fas fa-eye text-" ></i>
                        <p> View Rooms</p>
                      </a> 
                    </li>
                    <li class="nav-item">
                      <a class="nav-link  "  href="{{ url('admin/addrooms') }}" id="addrooms">
                        <i class="nav-icon fas fa-plus-circle text-" ></i>
                        <p>Add Rooms</p>
                      </a>
                    </li>
                     <li class="nav-item">
                      <a  class="nav-link  "  href="{{url('admin/addroomtype')}}" id="addtype">
                        <i class="nav-icon fas fa-plus-circle text-" ></i>
                        <p>Room type</p>
                      <a>
                    </li>
                    <li class="nav-item">
                      <a  class="nav-link  " href="{{url('admin/addamenities')}}" id="addam">
                        <i class="nav-icon fa fa-wifi nav-icon text- " ></i>
                        <p>Room Amenities</p>
                      </a>
                    </li>
                  
             
          

          
             </ul>
          </li>
          <li class="nav-item has-treeview  " id="managehotel">
            <a href="{{'admin'}}" class="nav-link  " > 
              <i class="nav-icon fas fa-building"></i>
              <p>Manage Hotel<i class="fa fa-angle-left right"></i>
              </p>
            </a>
                  <ul class="nav nav-treeview">
                    
                   
                    <li class="nav-item">
                      <a  class="nav-link " href="{{url('admin/settings')}}" id="hpro">
                        <i class="nav-icon fas fa-cogs text-"></i>
                        <p>Hotel Profile  </p>
                      </a>
                    </li>
                  </ul>
          </li>
       

          <li class="nav-item has-treeview " id="manageres">
            <a href="" class="nav-link  ">
              <i class="nav-icon fa fa-book"></i>
              <p>
                <b>Manage Reservation</b>
               
               
      
                <span class="badge badge-info right"></span>
              
               <i class="fa fa-angle-left right"></i>
              </p>
            </a>

              <ul class="nav nav-treeview">
              <li class="nav-item  " >
                <a  class="nav-link  "  href="{{url('admin/reservation-pending')}}" id="spend">
                 <i class="nav-icon fa fa-clock-o text-warning" ></i>
                  <p><b> Pending</b></p>
                   <span class="badge badge-warning right"></span>
                </a>
              </li>
               
                <li class="nav-item  " >
                <a  class="nav-link  "  href="{{url('admin/reservation-manage-confirmed')}}" id="scheck">
                 <i class="nav-icon fa fa-calendar-check text-primary" ></i>
                  <p><b> Checkin</b></p>
                   <span class="badge badge-warning right"></span>
                </a>
              </li>
             
                  <li class="nav-item  " >
                <a  class="nav-link  "  href="{{url('admin/reservation-manage-checkin')}}" id="sout">
                 <i class="nav-icon fa fa-calendar-times text-black" ></i>
                  <p><b> Checkout</b></p>
                   <span class="badge badge-warning right"></span>
                </a>
              </li>
               




               
                   <li class="nav-item" >
               
                <a  class="nav-link " href="{{url('admin/reservation-list')}}" id="slist">
                 <i class="nav-icon fa fa-list-alt" ></i>
                 
                  <p><b>Reservation List</b></p>
                 <span class="badge badge-warning right"></span>
                </a>
              </li>
             
          

          
             </ul>
          </li>
          
          <li class="nav-item has-treeview" id="srep">
            <a href="report.php" class="nav-link">
              <i class="nav-icon fa fa-folder"></i>
              <p><b> Reports</b>
               
                 <span class="badge badge-info right"></span>
                  <i class="right fa fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item  " >
                <a  class="nav-link   "  href="{{url('admin/reports-reservation')}}" id="sresrep">
                 <i class="nav-icon fa fa-clipboard " ></i>
                  <p><b> Reservation Report</b></p>
                   <span class="badge badge-warning right"></span>
                </a>
              </li>
              <li class="nav-item  " >
                <a  class="nav-link   "  href="{{url('admin/reports-sales')}}" id="ssrep">
                 <i class="nav-icon fa fa-clipboard" ></i>
                  <p><b> Sales Report</b></p>
                   <span class="badge badge-warning right"></span>
                </a>
              </li>
             
            </ul>
            </li>

          <li class="nav-item has-treeview">
            <a data-toggle="modal" data-target="#modal-sm" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
               <b> Logout</b>
                
                 <span class="badge badge-info right"></span>
                  <i class="right fa fa-angle-left right"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
</aside>

<div class="modal fade" id="modal-sm">
  <div class="modal-dialog modal-sm">
   <div class="modal-content">
    <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true" style="float: right;margin-right: 10px" >&times;</span>
    </button>
    <div class="modal-body">
      <p style="background-color: ">Are you sure you want to logout?&hellip;</p>
    </div>
    <div class="btn-group">
      <a class="btn " style="background: #fc7169" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              <button type="button" class="btn " style="background: #b6bece" data-dismiss="modal">Cancel</button>
            
                 </div>        
          </div>
         
        </div>
        
      </div>

  
