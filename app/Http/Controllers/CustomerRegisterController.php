<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\customer;


class CustomerRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('101.register');
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
       $cus= new customer;

       $this->validate($request,[
            'email' => ['required',
                        Rule::unique('customers')->where('status','Registered')

          ]
        ]);
       $cus->fname=$request->input('email');
       $cus->lname="";
       $cus->contact_no=0;
       $cus->email=$request->input('email');
       $cus->password=$request->input('password');
       $cus->ch_name="";
       $cus->c_type="";
       $cus->c_number=0;
       $cus->status="Registered";
       $cus->image="user-3.jpg";
       $cus->save();
       $cus=customer::all()
       ->where('email',$request->input('email'))
       ->where('status','Registered');
       session(['customer'=>$cus]);
       return redirect('/');

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
