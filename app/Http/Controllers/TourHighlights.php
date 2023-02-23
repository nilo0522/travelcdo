<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\highlight;
use App\goodfor;

class TourHighlights extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tour.pages.highlights');
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
        $high=$request->input('high');
        $id=$request->input('id');
        $good=$request->input('good');    
               for ($i=0; $i < count($high) ; $i++) { 
                            
                        $h= new highlight;
                        $h->des=$high[$i];
                        $h->t_id=$id;
                        $h->save();
          }
          for ($i=0; $i <count($good) ; $i++) { 
             $g= new goodfor;
             $g->t_id=$id;
             $g->des=$good[$i];
             $g->save();

          }
            
         return redirect('tour-view');
            
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('tour.pages.highlights')
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
