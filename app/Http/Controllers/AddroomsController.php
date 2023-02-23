<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\roomtype;
use App\amenities;

class AddroomsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $user_id=Auth::id();
        $types= roomtype::all()->where('hotel_id',$user_id);
        $am= amenities::all()->where('hotel_id',$user_id);
        return view('admin/rooms.addrooms')->with('types',$types)->with('am',$am);
    }
    
}
