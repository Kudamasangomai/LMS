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
        
    
     
        return view('pages.dashboard');
    }
}
