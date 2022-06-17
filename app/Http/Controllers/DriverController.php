<?php

namespace App\Http\Controllers;

use App\Models\driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= array(
            'title'=> 'Drivers',
            'drivers'=> driver::orderby('driver_name','asc')->paginate(20)
        );
        //dd($data);
        return view('drivers.driverlist')->with($data);
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
        //$contact = driver::find($id);
         $data = array(
                'title' => 'Update Driver',
                'driver' => driver::find($id),

        );
    
        return view('drivers.driveredit')->with($data);
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
            $this->validate($request,[
                'drivername'=>'required',
                'driverid'=>'required',
                'driverphonenumber'=>'required',
            ]);      
           
            $driver = driver::find($id);
            $driver->driver_name = $request->input('drivername');
            $driver->driver_id_no = $request->input('driverid');
            $driver->driver_phonenumber = $request->input('driverphonenumber');
            $driver->save();
            return redirect()->back()->with('success',"Driver updated");
   
 
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
