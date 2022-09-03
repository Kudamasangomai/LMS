<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
// use DB;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Js;

class dashboardController extends Controller
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
        $fruit = User::where('roles',9)->get();
    	$veg = User::where('roles',3)->get();
    	
    	$fruit_count = count($fruit);    	
    	$veg_count = count($veg);
    	
    	
    	return view('pages.dashboard',compact('fruit_count','veg_count'));
    
     
        // return view('pages.dashboard');
    }
}
