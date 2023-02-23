<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\hotel_details;
use App\reservation;
use App\rooms;
use DB;
use Session;
use App\notification;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
       
        return view('101.success');
       
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
       session(['hotel' => request()->all()]);
        $hotel=hotel_details::all()->where('id',$request->input('h_id'));
        session(['hotel'=>$hotel]);
        if(session()->has('customer')) {
          foreach (session('customer') as $key => $value) {
            $id=$value->id;
          }
          $customer=customer::find($id);
          $customer ->fname=$request->input('fname');
         $customer ->lname=$request->input('lname');
          $customer ->contact_no=$request->input('contact_no');
           $customer ->email=$request->input('email');
            $customer ->ch_name=$request->input('ch_name');
             $customer ->c_number=$request->input('c_number');
             $customer ->c_type=$request->input('c_type');
              $customer ->password=$value->password;
              $customer ->status="Registered";
              $customer ->image=$value->image;
              $customer->save();
              $session=customer::all()->where('id',$value->id);
              session()->forget('customer');
              session(['customer'=>$session]);
              foreach ($session as $key => $value) {
                $id=$value->id;
              }
        }else{

         
       
        $customer= new customer;
        $customer ->fname=$request->input('fname');
         $customer ->lname=$request->input('lname');
          $customer ->contact_no=$request->input('contact_no');
           $customer ->email=$request->input('email');
            $customer ->ch_name=$request->input('ch_name');
             $customer ->c_number=$request->input('c_number');
             $customer ->c_type=$request->input('c_type');
              $customer ->password="-";
              $customer ->status="Guest";
              $customer ->image="";
              $customer->save();

              $cus=DB::table('customers')->latest()->first();
              $id=$cus-> id;
        }
         
              $res= new reservation;
              $qty=$request->input('qty');
              $setroom=$request->input('setroom');
              $rooms=rooms::all();
              for($i=0 ;$i< count($qty);$i++){
                if($qty[$i] !=0){
                    foreach($rooms as $r){
                         if($r->id == $setroom[$i]){
                            $res= new reservation;
                          $res->cus_id=$id;
                          $res->hotel_id=$request->input('h_id');
                          $res->room_id=$r->id;
                          $res->book_status="Pending";
                          $res->night=session('night');
                          $res->check_in=session('room.start');
                          $res->check_out=session('room.ends');
                          $res->price=$r->room_price;
                          $res->qty=$qty[$i];
                          $total=$r->room_price * session('night');
                          $total2=$total * $qty[$i];
                          $res->total=$total2;
                          $res->save();
                            
                         }
                            
                    }
                }
              }
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
              
          $noti= new notification;
          $noti->type="reservation";
          $noti->save();                        

                                   
                                   
                                   
                                     
              
              return redirect('reserve');
        
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
