<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Session extends Controller
{
    public function show(Request $request)
    {
    	$request->session()->put('user',$request->input('email'));
    	return view('admin.dashboard')->with('data',$request->session()->get('user'));

    }
}
