<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\customer;
use App\reservation;
use App\rooms;
use App\amenities;
use App\roomamenities;
use DB;
use App\invoices;
use App\hotel_details;


class DashboardController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $hotel=hotel_details::all()->where('hotel_id',Auth::user()->id);
        $rooms=rooms::all()->where('hotel_id',Auth::user()->id);
        $res_alls=reservation::all();
        $res=reservation::all();
        
        $customer=customer::all();
        if(count($hotel) >0){
        foreach ($hotel as $key => $value) {
            $res_all=reservation::all()->where('hotel_id',$value->id);
            $pending=reservation::all()->where('book_status','Pending')->where('hotel_id',$value->id);
            $pending=$pending->count();
            $confirm=reservation::all()->where('book_status','Confirmed')->where('hotel_id',$value->id);
            $confirm=$confirm->count();
            $book=reservation::all()->where('hotel_id',$value->id);
                $book=$book->count();
        }
    }else{
        $pending=0;
        $book=0;
        $confirm=0;
        $res_all=[];
    }
        if(Auth::user()->role!="hotel"){
           Auth::logout();
           return redirect('login');
        }
         $user_id=Auth::id();
        
        $rooms=rooms::all()->where('hotel_id',$user_id);
        $count=$rooms->count();
        
        return view('admin.dashboard')
        ->with('pending',$pending)
         ->with('book',$book)
         ->with('confirm',$confirm)
        ->with('count',$count)
         ->with('rooms',$rooms)
        ->with('customer',$customer)
        ->with('res',$res)
        ->with('res_all',$res_all)
        ->with('am',roomamenities::all())
        ->with('amenities',amenities::all()) ->with('alls',$res_alls);
        
     
    }


}
