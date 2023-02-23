<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\hotel_facilities;
use App\hotel_gallery;
use App\hotel_details;
use App\advance_features;
use App\meals;
use DB;

class HotelFacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active1="";
        $active2="";
        $active3="active";
        $show1="";
        $show2="";
        $show3="show";
      $user_id=Auth::id();
      $hotel=hotel_details::all()->where('hotel_id',$user_id);
      $meal=meals::all()->where('hotel_id',$user_id);
      $gal=hotel_gallery::all()->where('hotel_id',$user_id);
      $fac=hotel_facilities::all()->where('hotel_id',$user_id);
        return view('admin/hotel.settings')
        ->with('hotel',$hotel)
        ->with('meal',$meal)
        ->with('show1',$show1)
        ->with('show2',$show2)
        ->with('show3',$show3)
        ->with('active1',$active1)
        ->with('active2',$active2)
        ->with('active3',$active3)
        ->with('gal',$gal)
        ->with('facs',$fac);
    }

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
            'facilities' => 'required'
        ]);
        $user_id=Auth::id();

        $validate_fas=hotel_facilities::all()->where('hotel_id',$user_id);
        foreach ($validate_fas as $key ) {
           if ($key->facilities==$request->input('facilities')) {
               return redirect('admin/settings-facilities')->with('error',$request->input('facilities').' is already added');
           }

        }

        
         
        $hotel=hotel_details::all()->where('hotel_id',$user_id);
        $fas= new hotel_facilities;
        $fas-> facilities =$request->input('facilities');
        $fas -> hotel_id =Auth::id();
        foreach ($hotel as $key) {
          $fas -> hd_id = $key -> id;
        }
        $fas->save();
        return redirect('admin/settings-facilities')->with('success','Facilities save Successfully!');
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
        $fas= hotel_facilities::find($id);
        $fas-> facilities =$request->input('facilities');
      
        $fas->save();
        return redirect('admin/settings-facilities')->with('success','Facilities updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fas= hotel_facilities::find($id);
        $fas->delete();
        return redirect('admin/settings-facilities')->with('success','Facilities deleted Successfully!');
    }
}
