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

class AdminManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        ->where('book_status','Pending');
        foreach ($res as $key => $value) {
           $rooms =rooms::all()->where('id',$value->room_id);
           foreach ($rooms as $key => $room) {
                $qty=$room->room_qty_left;
                $qty1=$value->qty;
                $qty_left=$qty-$qty1;
               $_r=rooms::where('id',$value->room_id)->update(['room_qty_left'=>$qty_left]);
              
           }
          
        }

        $date=$request->input('book_date');
        DB::update("update reservations set book_status='Confirmed' where cus_id='$id' and book_status='Pending' and created_at ='$date' and room_id='$room_id' ");
        
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
          $invoice=invoices::all()->where('cus_id',$id);
         


          return redirect('admin/reservation-manage/'.$id)->with('success','Confirmed successfully');
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
        session(['status'=>'Pending']);
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
        ->where('book_status','Pending');
       
           $rooms =rooms::all()->where('id',$room_id);
           foreach ($rooms as $key => $room) {
                $qty=$room->room_qty_left;
                
                $qty_left=$qty+$qty2;
                echo $qty_left;
            
                
           }
        
       $_r=rooms::where('id',$room_id)->update(['room_qty_left'=>$qty_left]);

        $date=$request->input('book_date');
        DB::update("update reservations set book_status='Cancelled' where cus_id='$id' and book_status='Pending' and created_at ='$date' and room_id='$room_id'  ");
        
       
       


        return redirect('admin/reservation-manage/'.$id)->with('success','Cancelled successfully');
    }
}
