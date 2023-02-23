<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hotel_details;
use App\hotel_gallery;
use App\roomgallery;
use App\hotel_facilities;
use App\rooms;
use App\amenities;
use App\roomamenities;
use App\meals;
class HoteldetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenities=amenities::all();
        $r_am= roomamenities::all();
         $r_ams= roomamenities::all();
       
        $r_gs2=roomgallery::all();
        
       
        return view('101.hotel_details')
        ->with('r_am',$r_am)
        ->with('am',$amenities)
        ->with('r_gs',$r_gs2)
        ->with('r_ams',$r_ams);
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
        session(['h'=>$id]);
        $hotels=hotel_details::all();
        $hotel_details=hotel_details::all()->where('id',$id);
        $hotel_facilities=hotel_facilities::all()->where('hotel_id',$id);
        $hotel_gallery=hotel_gallery::all();
        $rooms = rooms::all()->where('hotel_id',$id);
        $amenities=amenities::all();
        $r_am= roomamenities::all();
         $r_ams= roomamenities::all();
       
        $r_gs2=roomgallery::all();
        $meals= meals::all()->where('hotel_id',$id);
       
        return view('101.hotel_details')
        ->with('hotel_details',$hotel_details)
        ->with('hotel_facilities',$hotel_facilities)
        ->with('hotel_gallery',$hotel_gallery)
        ->with('rooms',$rooms)
        ->with('r_am',$r_am)
        ->with('am',$amenities)
        ->with('meals',$meals)
        ->with('r_gs',$r_gs2)
        ->with('r_ams',$r_ams)
        ->with('hotels',$hotels)
        ;
        
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
