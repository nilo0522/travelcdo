<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    
use Illuminate\Support\Facades\Auth;
use App\rooms;
use App\roomamenities;
use App\roomtype;
use App\amenities;
use DB;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $user_id=Auth::id();
      $rooms= rooms::all()->where('hotel_id',$user_id);
      
         //roomtype
        //$rtpe=roomtype::where('id',$)
      $amenities=amenities::all();
      return view("admin.rooms.rooms")
      ->with('am',roomamenities::all())
      ->with('amenities',$amenities)
      ->with('rooms',$rooms);
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
        $request->duplicate();
         

         

        $rooms = new rooms;
      
        

        $rooms -> room_price= $request->input ('price');
        $rooms -> room_person = $request -> input('nop');
        $rooms -> room_type = $request -> input('room_type');
        $rooms -> room_image = $request -> input('r_image');
        $rooms -> room_qty = $request -> input('qty');
        $rooms -> room_qty_left = $request -> input('qty');
         $user_id=Auth::id();
       $rooms -> hotel_id=$user_id;
       //store in roomamenities -> 
       $amenities = new roomamenities;
       
       $r_am=$request->get('amenities');
      $rooms -> save(); 
      $id = DB::table('rooms')->latest()->first();
      $room_id = $id -> id;
       foreach($r_am as $am =>$value){
        
        DB::insert("insert into roomamenities (amenities_id,room_id) values ('$r_am[$am]','$room_id')");
        
       }
       
     
        $am=roomamenities::all()->where('room_id',$room_id);
        $amenities=amenities::all();
        session(['room' => request()->all()]);
        return redirect('admin/addrooms')
       ->with('am',$am) 
       ->with('amenities',$amenities)
        ->with('newroom',$request ->input('r_image'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user_id=Auth::id();
        $types= roomtype::all()->where('hotel_id',$user_id);
        $am= amenities::all()->where('hotel_id',$user_id);
        $rooms=rooms::all()->where('id',$id);
        $amenities=roomamenities::all()->where('room_id',$id);
        return view('admin/rooms.room_update')
        ->with('types',$types)
        ->with('rooms',$rooms)
        ->with('amenities',$amenities)
        ->with('am',$am);
     
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
        $rooms=rooms::find($id);
        $rooms -> room_type = $request -> input('rtype');
         $rooms -> room_person = $request -> input('nop');
          $rooms -> room_price = $request -> input('price');
          if($request -> input('r_image')!=null){
            $rooms -> room_image = $request -> input('r_image');
          }
           
           $rooms -> save();

         $r_am=$request->get('amenities');
         $roomamenities= roomamenities::all()->where('room_id',$id);
         foreach($roomamenities as $am ){
        
        DB::delete("delete from roomamenities where id='$am->id' ;");
        
       }
       foreach ($r_am as $key => $value) {
            DB::insert("insert into roomamenities (amenities,room_id) values ('$r_am[$key]','$id')");
       }
       return redirect('admin/rooms')
       ->with('success','Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $rooms=rooms::find($id);
      $rooms->delete();
      return redirect('admin/rooms')
      ->with('success','Deleted successfully');
    }
}
