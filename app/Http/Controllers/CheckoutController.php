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
use App\notification;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $hotel=hotel_details::all()->where('hotel_id',Auth::user()->id);
        $rooms=rooms::all()->where('hotel_id',Auth::user()->id);
        
        $res=reservation::all()->unique('created_at');
        $customer=customer::all();
        if(count($hotel) >0){
        foreach ($hotel as $key => $value) {
           $res_all=reservation::all()->where('hotel_id',$value->id)->where('book_status','Checkin')->unique('created_at');
           $res_alls=reservation::all()->where('hotel_id',$value->id);
        }
        }else{
            $res_all=[];
            $res_alls=[];
        }  

        
        return view('admin.reservation.checkout')
        ->with('rooms',$rooms)
        ->with('customer',$customer)
        ->with('res',$res)
        ->with('res_all',$res_all)
        ->with('am',roomamenities::all())
        ->with('amenities',amenities::all()) ->with('alls',$res_alls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $id=$request->input('cus_id');
        $room_id=$request->input('room_id');
        $res=reservation::all()
        ->where('cus_id',$id)
        ->where('book_status','Checkin');
          foreach ($res as $key => $value) {
           $rooms =rooms::all()->where('id',$value->room_id);
           foreach ($rooms as $key => $room) {
                $qty=$room->room_qty_left;
                $qty1=$value->qty;
                $qty_left=$qty+$qty1;
               $_r=rooms::where('id',$value->room_id)->update(['room_qty_left'=>$qty_left]);
              
           }
          
        } 

        $date=$request->input('book_date');
       DB::update("update reservations set book_status='Checkout' where cus_id='$id' and book_status='Checkin' and created_at ='$date'  ");
        return redirect('admin/reservation-manage-checkin')->with('success','Checkout successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel=hotel_details::all()->where('hotel_id',Auth::user()->id);
        $rooms=rooms::all()->where('hotel_id',Auth::user()->id);
        $res_alls=reservation::all();
        $res=reservation::all();
        $customer=customer::all()->where('id',$id);
        foreach ($hotel as $key => $value) {
           $res_all=reservation::all()->where('hotel_id',$value->id);
           
        }
        session(['status'=>'Checkin']);
       
         
        return view('admin.reservation.manage_checkout')
        ->with('rooms',$rooms)
        ->with('customer',$customer)
        ->with('res',$res)
        ->with('res_all',$res_all)
        ->with('am',roomamenities::all())
        ->with('amenities',amenities::all()) ->with('alls',$res_alls);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $id=$request->input('cus_id');
        $room_id=$request->input('room_id');
        $qty2=$request->input('qty');
        $res=reservation::all()
        ->where('cus_id',$id)
        ->where('book_status','Checkin');
       
           
        
     

       
        
              
        foreach ($res as $key => $value) {
           $rooms =rooms::all()->where('id',$value->room_id);
           foreach ($rooms as $key => $room) {
                $qty=$room->room_qty_left;
                $qty1=$value->qty;
                $qty_left=$qty+$qty2;
              
                 
           }
          
        } 
             $_r=rooms::where('id',$room_id)->update(['room_qty_left'=>$qty_left]);               
         $date=$request->input('book_date');
       DB::update("update reservations set book_status='Checkout' where cus_id='$id' and book_status='Checkin' and created_at ='$date' and room_id='$room_id'  ");
       


       return redirect('admin/reservation-manage-checkin/'.$id)->with('success','Checkout successfully');
    }
}
