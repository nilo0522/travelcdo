<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\roomtype;
use App\User;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::id();
        $roomtype= roomtype::all()->where('hotel_id',$user_id);
        return view("admin.rooms.addroomtype")->with('roomtypes',$roomtype);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
            'roomtype' => 'required'
        ]);


        $roomtype = new roomtype;
        $roomtype -> des = $request ->input('roomtype');
       
        $user_id=Auth::id();
        $roomtype -> hotel_id =$user_id;
      
        $roomtype -> save(); 

        return redirect('admin/addroomtype')->with('success','Added Successfully!');
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
        


        $roomtype = roomtype::find($id);
        $roomtype -> des = $request ->input($id);

        $roomtype -> save(); 

        return redirect('admin/addroomtype')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $roomtype = roomtype::find($id);
       $roomtype ->delete();

        return redirect('admin/addroomtype')->with('success','Deleted Successfully!');
    }
}
