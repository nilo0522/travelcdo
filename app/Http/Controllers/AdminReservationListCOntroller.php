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


class AdminReservationListCOntroller extends Controller
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
        $res_alls=reservation::all();
        $res=reservation::all();
        $customer=customer::all();
        if(count($hotel) >0){
        foreach ($hotel as $key => $value) {
           $res_all=reservation::all()->where('hotel_id',$value->id);
           
        }
        }else{
            $res_all=[];
        }  
        return view('admin.reservation.reservationlist')
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
