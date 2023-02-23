<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\hotel_details;

class _101_1 extends Controller
{
   public function index()
    {
    	$hotel_details=hotel_details::all();
        return view('101.home')
        ->with('hotels',$hotel_details);
    }
}
