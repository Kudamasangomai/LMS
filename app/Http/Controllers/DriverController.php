<?php

namespace App\Http\Controllers;

use App\Models\consignment;
use App\Models\driver;
use App\Models\tripfuel;
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
            'drivers'=> driver::orderby('driver_name','asc')->paginate(10)
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
 
        $title= 'Create Driver';
        return view('drivers.createdriver',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          
             'drivername' => 'required',
             'driveremail' => 'required|unique:drivers,driver_email',
             'driverlicenseno' => 'required|unique:drivers,driver_license_no',
             'driverphonenumber'=>'required|unique :drivers,driver_phonenumber|numeric',
             'drivernationalid'  =>'required|unique:drivers,driver_id_no',
             
         ]);

         $driver = new driver();
         $driver->driver_name = $request->input('drivername');
         $driver->driver_email = $request->input('driveremail');
         $driver->driver_license_no = $request->input('driverlicenseno');
         $driver->driver_phonenumber = $request->input('driverphonenumber');
         $driver->driver_id_no = $request->input('drivernationalid');
         $driver->driver_res_place = 'Zimbabwe';
        $driver->save();
        return redirect('/drivers')->with('success','Driver Succefuly Created');
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'title' => 'Driver Detailed Infomation',
            'driver' => driver::find($id),
           'totaltrips' => tripfuel::where('driver_id',$id)

    );
       return view('drivers.driverdetail')->with($data);
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
           
                'address'=>'required',
                'driveremail' => 'required',
                'driverlicenseno' => 'required',
                'driverphonenumber'=>'required|numeric',
                // 'drivernationalid'  =>'required',
            ]);      
           
            $driver = driver::find($id);
            $driver->driver_name = $request->input('drivername');
            $driver->driver_id_no = $request->input('driverid');
            $driver->driver_license_no = $request->input('driverlicenseno');
            $driver->driver_phonenumber = $request->input('driverphonenumber');
            $driver->driver_res_place = $request->input('address');
            $driver->save();
            return redirect()->back()->with('success', " $driver->driver_name Profile updated");
   
 
    }
    public function driverperformance($id)
    {

    
     
        $data = array(
            'title' => 'Driver Perfomance',
            'driver' => driver::find($id),
            'drivertrips' => tripfuel::where('driver_id',$id)->paginate(10),

    );
    //dd($data['drivertrips']);
        return view('drivers.driverperformance')->with($data);
       
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = driver::find($id);
        $driver->delete();
        return redirect('/drivers')->with('success',"Driver Succesfully Deleted");
  
    }
    public function delete($id)
    {
        $driver = driver::find($id);
        $title = 'Delete Driver';
        return view('drivers.confirmdelete',compact('driver','title'));
  
    }
}
