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
class CheckinController extends Controller
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
           $res_all=reservation::all()->where('hotel_id',$value->id)->where('book_status','Confirmed')->unique('created_at');
            $res_alls=reservation::all()->where('hotel_id',$value->id);

        }
        }else{
            $res_all=[];
        }  
        
     
        
        return view('admin.reservation.checkin')
        ->with('rooms',$rooms)
        ->with('customer',$customer)
        ->with('res',$res)
        ->with('res_all',$res_all)
        ->with('am',roomamenities::all())
        ->with('amenities',amenities::all())
         ->with('alls',$res_alls);

        
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
        ->where('book_status','Confirmed');
       

        $date=$request->input('book_date');
       DB::update("update reservations set book_status='Checkin' where cus_id='$id' and book_status='Confirmed' and created_at ='$date'  ");
        return redirect('admin/reservation-manage-confirmed')->with('success','Checkin successfully');
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
        session(['status'=>'Confirmed']);
        return view('admin.reservation.manage_confirmed')
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
        ->where('book_status','Confirmed');
       
           
        
     

        $date=$request->input('book_date');
        DB::update("update reservations set book_status='Checkin' where cus_id='$id' and book_status='Confirmed' and created_at ='$date' and room_id='$room_id'  ");
        
       
       


        return redirect('admin/reservation-manage-confirmed/'.$id)->with('success','Checkin successfully');
    
    }
}
