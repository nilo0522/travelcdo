<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
class CustomerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.setting');
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

         $cus=customer::find($id);
        if($request->input('fname')!=""){
             $cus->fname=$request->input('fname');
        }
         if($request->input('lname')!=""){
            $cus->lname=$request->input('lname');
        }
         if($request->input('contact_no')!=""){
              $cus->contact_no=$request->input('contact_no');;
        }
         if($request->input('email')!=""){
            $cus->email=$request->input('email');
        }
         if($request->input('password')!=""){
             $cus->password=$request->input('password');
        }
         if($request->input('ch_name')!=""){
            $cus->ch_name=$request->input('ch_name');
        }
         if($request->input('c_type')!=""){
              $cus->c_type=$request->input('c_type');
        }

         if($request->input('c_number')!=""){
              $cus->c_number=$request->input('c_number');
        }

       
      
       
       
       
      
      
       $cus->status="Registered";
       if($request->input('image')!=""){
         $cus->image=$request->input('image');
       }
      
       $cus->save();
       session()->forget('customer');
       $cus=customer::all()->where('id',$id);
        session(['customer'=>$cus]);
        
       return redirect('Setting');
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
