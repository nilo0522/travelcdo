<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hotel_details;
use App\rooms;
use App\hotel_facilities;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        
        $fas= hotel_facilities::all()->where('h_id',session('id'));
         $hotel=hotel_details::all()->where('id',session('id'));
         $qty=$request->input('qty');
         $room_id=$request->input('room_id');
        $fprice=$request->input('fprice');

            
        $setroom=array();
        if($qty!=[]){
        foreach ($qty as $q => $i) {
            if($qty[$q] !=null){
                
    
               $setroom[$q]=$room_id[$q];


                // /echo $i;
            }
         
        }
    }
        $rooms=rooms::all();
        
     return view('101.customer_fillup')
     ->with('rooms',$rooms)
     ->with('hotel',$hotel)
     ->with('qty',$qty)
     ->with('setroom',$setroom)
     ->with('fprice',$fprice)
     ->with('fas',$fas);
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
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

        
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
