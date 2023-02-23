<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\amenities;
use DB;

class RoomamenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::id();
        $amenities= amenities::all()->where('hotel_id',$user_id);
        return view("admin.rooms.addamenities")->with('amenities',$amenities);

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
        $this->validate($request,[
            'amenities' => 'required'
        ]);


        $amenities = new amenities;
        $amenities -> amenities = $request ->input('amenities');
        $user_id=Auth::id();
        $amenities -> hotel_id=$user_id;
        $amenities -> save(); 
        
        return redirect('admin/addamenities')->with('success','Added Successfully!');
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
        $amenities = amenities::find($id);
        $amenities -> amenities = $request ->input($id);

        $amenities -> save(); 

        return redirect('admin/addamenities')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amenities = amenities::find($id);
       $amenities ->delete();

        return redirect('admin/addamenities')->with('success','Deleted Successfully!');
    }
}
