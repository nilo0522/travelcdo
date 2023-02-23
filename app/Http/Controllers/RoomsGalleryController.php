<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rooms;
use App\roomgallery;

class RoomsGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $r_gallery=new roomgallery;
        $r_gallery -> image =$request ->input('image');
        $r_gallery -> room_id =$request ->input('room_id');
        $r_gallery ->save();
        $rooms=rooms::all()->where('id',$request ->input('room_id'));
         $r_gallery=roomgallery::all()->where('room_id',$request ->input('room_id'));
        return redirect('admin/rooms-gallery/'.$request ->input('room_id'))
        ->with('r_gallery',$r_gallery)
        ->with('rooms',$rooms);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rooms=rooms::all()->where('id',$id);
        $r_gallery=roomgallery::all()->where('room_id',$id);
        return view('admin.rooms.room_gallery')
        ->with('r_gallery',$r_gallery)
        ->with('rooms',$rooms);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $gal = roomgallery::find($id);
       $gal ->delete();
       $r=$request->input('room_id');

        return redirect('admin/rooms-gallery/'.$r)
        ->with('success','Deleted Successfully!');
    }
}
