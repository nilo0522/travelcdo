 @php
      $hotel="";
      $dash="";
      $menu="";
      $room="";
      $addroom="";
      $rtype="";
      $ram="";
      $set="";
      if (Request::is('admin'))
      {
        $dash="active";
      }
      elseif(Request::is('admin/rooms'))
      {
        $hotel="active";
        $menu="menu-open";
        $room="active";
      }
      elseif (Request::is('admin/addrooms')) 
      {
         $hotel="active";
        $menu="menu-open";
        $addroom="active";
      }
      elseif (Request::is('admin/addroomtype')) 
      {
        $hotel="active";
        $menu="menu-open";
        $rtype="active";
      }
      elseif (Request::is('admin/addamenities')) 
      {
         $hotel="active";
        $menu="menu-open";
        $ram="active";
      } 
      elseif (Request::is('admin/settings'))
      {
         $hotel="active";
        $menu="menu-open";
        $set="active";
      }
  @endphp      
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: auto;">
  <a href="#" class="brand-link">
    <img src="{{asset('images/logo.png')}}" alt="Admin Logo" class="brand-image img-circle elevation-3"  style="opacity: .8">
      <span class="brand-text font-weight-light">TravelCDO</span>
  </a>
    <div class="sidebar" >
      <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
        <div class="image">
          <img src="{{asset('images/nilo.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
       <div class="info">
          <a href="{{url('admin')}}"     class="d-block">{{ Auth::user()->name }}
          </a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="{{url('tour-dashboard')}}" class="nav-link {{$dash}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
             <li class="nav-item has-treeview ">
            <a href="" class="nav-link  ">
              <i class="nav-icon fa fa-tree"></i>
              <p>
                <b>Manage Tour</b>
               
               
      
                <span class="badge badge-info right"></span>
              
               <i class="fa fa-angle-left right"></i>
              </p>
            </a>

              <ul class="nav nav-treeview">
              
               <li class="nav-item">
                      <a  class="nav-link "  href="{{ url('tour-view') }}">
                        <i class="nav-icon fas fa-eye text-" ></i>
                        <p> View Tours</p>
                      </a> 
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{$addroom}}  "  href="{{ url('tour-manage')}}">
                        <i class="nav-icon fas fa-plus-circle text-" ></i>
                        <p>Add Tours</p>
                      </a>
                    </li>
                </ul>
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

  
