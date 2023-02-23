<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\hotel_details;
use App\advance_features;
use App\meals;
use App\hotel_gallery;
use App\hotel_facilities;
use DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        if(Auth::guest()){
            return redirect('admin');
        }
        $active1="active";
        $active2="";
        $active3="";
        $show1="show";
        $show2="";
        $show3="";
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
       

       //  return redirect('admin/setting')->with('success','Image added successfully');
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
            'name' => 'required',
             'h_image' => 'required',
            'price' => 'required',
            'distance' => 'required',
            'email' => 'required',
            'address' => 'required',
            'description' => 'required',

        ]);
         $hotel_details = new hotel_details;
        
        $hotel_details -> name = $request ->input('name');
        $hotel_details -> address = $request ->input('address');
        $hotel_details -> price = $request -> input('price');
        $hotel_details -> email = $request ->input('email');
        $hotel_details -> description = $request ->input('description');
        $hotel_details -> image = $request ->input('h_image');
        $hotel_details -> distance = $request ->input('distance');
        $user_id=Auth::id();
       $hotel_details -> hotel_id=$user_id;
       
         $meals=$request->input('meal');
      
         foreach($meals as $key => $value) {
             DB::insert("insert into meals (meals,hotel_id) values ('$meals[$key]','$user_id')");
            
         }
          $hotel_details -> save(); 
         
        
        return redirect('admin/settings')->with('success','Details save Successfully!');
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
       


        $hotel_details=hotel_details::find($id);
        
        $hotel_details -> name = $request ->input('name');
        $hotel_details -> address = $request ->input('address');
        $hotel_details -> price = $request -> input('price');
        $hotel_details -> email = $request ->input('email');
        $hotel_details -> distance = $request ->input('distance');
        $hotel_details -> description = $request ->input('description');
        $d=$request ->input('h_image');
        if(!empty($d)){
            $hotel_details -> image = $d;
        }
        
        $user_id=Auth::id();
       $hotel_details -> hotel_id=$user_id;
        $hotel_details -> save(); 
         $meal=meals::all()->where('hotel_id',$user_id);
         if(count($meal)>0){
            foreach ($meal as $key => $value) {
             $meals = meals::find($meal[$key]->id);
                $meals ->delete();
         }
         }
         
         $meals1=$request->input('meal');
        if(!empty($meals1)){
            foreach($meals1 as $key => $value) {
             DB::insert("insert into meals (meals,hotel_id) values ('$meals1[$key]','$user_id')");
            
         }
        }
         

       
        return redirect('admin/settings')->with('success','Updated Successfully!');
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
