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

class AdminReservationController extends Controller
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
        $res_alls=reservation::all()->where('book_status','Pending')->unique('created_at');
        $res=reservation::all()->unique('created_at');
        $customer=customer::all();
        if(count($hotel) >0){
        foreach ($hotel as $key => $value) {
           $res_all=reservation::all()->where('hotel_id',$value->id);
           
        }
        }else{
            $res_all=[];
        }  
        echo count($res_alls);
        $noti=notification::where('type','reservation');
        $noti->delete();
        return view('admin.reservation.pending')
        ->with('rooms',$rooms)
        ->with('customer',$customer)
        ->with('res',$res_alls)
        ->with('res_all',$res_all)
        ->with('am',roomamenities::all())
        ->with('amenities',amenities::all()) ->with('alls',$res_all);

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

        $date=$request->input('book_date');
        DB::update("update reservations set book_status='Confirmed' where cus_id='$id' and book_status='Pending' and created_at ='$date' ");
        
        $invoice= new invoices;
        $invoice ->cus_id=$id;
        $invoice ->night= $request->input('night');
        $invoice ->qty= $request->input('qty');
        $invoice ->total=$request->input('total');
        $invoice->payment=$request->input('c_type');
        $invoice->hotel_id=$request->input('h_id');
         $invoice->book_date=$request->input('book_date');
        $invoice->cntrl_no=substr(md5(rand()),0,10);
        $invoice->save();
        //  $invoice=invoices::all()->where('cus_id',$id);
         


          return redirect('admin/reservation-pending')->with('success','Confirmed successfully');

        
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
        return view('admin.reservation.manage')
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
        $res=reservation::find($id);
        $res-> book_status="Confirmed";
        $res->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
