<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoices;
use App\hotel_details;
use App\rooms;
use App\reservation;
class CustomerInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $hotel=hotel_details::all();
        foreach (session('customer') as $key => $value) {
            $id=$value->id;
        }
        $invoice=invoices::all()->where('cus_id',$id);
        return view('customer.invoice')
        ->with('hotel',$hotel)
        ->with('invoice',$invoice);
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
        $hotel=hotel_details::all();
        $rooms=rooms::all();
        $res=reservation::all();
        $invoice=invoices::all()->where('id',$id);
        return view('customer.print')
        ->with('hotel',$hotel)
        ->with('invoice',$invoice)
        ->with('res',$res)
        ->with('rooms',$rooms)
        ->with('id',$id);
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
