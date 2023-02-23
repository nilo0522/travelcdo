<?php

use App\notification;


$reserv=notification::all()->where('type','reservation');


$all=notification::all()->unique('type');
$c_all=$all->count();
?>



<nav class="main-header navbar navbar-expand navbar-dark nav-light  " >

  <ul class="navbar-nav  ">
      <li class="nav-item ">
        <a class="nav-link text-light" data-widget="pushmenu" href="#"><i class="fas fa-bars "></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link text-light">Home </a>
      </li>
 </ul>
 <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">0</span>
        </a>
      
          
        
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{ $c_all }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
          <div class="dropdown-divider"></div>
          @foreach($all as $all)
          @if($all->type=="reservation")
          <a href="{{ url('admin/reservation-pending') }}" class="dropdown-item">
            <i class="fas fa-suitcase mr-2"></i>  {{ count($reserv) }} new reservation  
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>@endif
         <div class="dropdown-divider"></div>
         @endforeach
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      
    </ul>
</nav>