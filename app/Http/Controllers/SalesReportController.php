<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\customer;
use App\reservation;
use App\rooms;
use App\amenities;
use App\roomamenities;
use DB;
use App\invoices;
use App\hotel_details;
use App\tempsalerep;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\salesreport;

class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel=hotel_details::all()->where('hotel_id',Auth::user()->id);
        if(count($hotel) >0){
        foreach ($hotel as $key => $value) {
           $invoice=invoices::all()->where('hotel_id',$value->id);
           
        }
        }else{
            $invoice=[];
        }  
            
            
        
        $customer=customer::all();
       
        return view('admin.reports.sales_report')
         ->with('invoice',$invoice)
         ->with('cus',$customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export(){

        return Excel::download(new salesreport, 'sales report.xlsx');
    }    

    public function create()
    {
       $inv=tempsalerep::all();
       return view('admin.reports.print_sales_report')
       ->with('inv',$inv);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         session(['start' => $request->input('start')]);
      session(['ends' => $request->input('ends')]);

            $hotel=hotel_details::all()->where('hotel_id',Auth::user()->id);
            foreach ($hotel as $key => $value) {
            $invoice=invoices::all()->where('hotel_id',$value->id);
          
        }
            
            
       
        $customer=customer::all();

       return view('admin.reports.sales_report')
         ->with('invoice',$invoice)
         ->with('cus',$customer);
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
