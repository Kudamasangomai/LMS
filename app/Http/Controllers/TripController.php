<?php

namespace App\Http\Controllers;

use App\Models\consignment;
use App\Models\driver;
use App\Models\fleet;
use App\Models\tripfuel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class TripController extends Controller
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
        $data = array(
            'title'=>'Fuel Variance',
           // 'consignments' => consignment::orderBy('dateofdispatch','desc')->paginate(10),
            'trip'=> tripfuel::orderBy('created_at','desc')->paginate(5),
            //'trip'=> tripfuel::with(['tripdriver'])->paginate(10),
        );
       // dd($data['trip']);
        return view('trip.index')->with($data);
    }

    /**
     * Show the form for creating a new Trip.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($consignmentno)
    {
        $con = consignment::where('consignmentno', $consignmentno)->get();
        $data = array(
            'title'=>'Create Trip',
          'consignments' =>$con,
            // 'drivers'=> driver::all(),// select * from drivers;
            // 'fleet'=> fleet::all(),
        );
        
        return view('trip.createtrip')->with($data);
    }

    /**
     * Store a newly created trip in storage/database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'consignmentno' => 'required|unique:tripfuels',
            'drivername' => 'required',
            'fleetno' => 'required',
            'openingkm' => 'required|max:7',
            'fuelbeforetrip'=>'required|max:4',
            
        ]);

        $tripdetails = new tripfuel();
        $tripdetails->consignmentno = $request->input('consignmentno');
        $tripdetails->driver_id = $request->input('drivername');
        $tripdetails->fleet_id = $request->input('fleetno');
        $tripdetails->openingkm = $request->input('openingkm');
        $tripdetails->fuelbeforetrip = $request->input('fuelbeforetrip');
        $tripdetails->user_id = auth()->user()->id;
        $tripdetails->closingkm = 0;
        $tripdetails->distance = 0;
        $tripdetails->fuelused = 0;
        $tripdetails->avgconsumption = 0;
        $tripdetails->fuelvarience = 0;
        $tripdetails->addtionalfuel = 0;//fuel for next trip
        $tripdetails->fuelintank = 0;
        $tripdetails->comment = 'In Transit';
        $tripdetails->shortage = 0;
        $tripdetails->tripstatus = 'open';
        //dd($tripdetails);
        $tripdetails->save();
        return redirect('/trip')->with('success','New Trip Created');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trip = tripfuel::find($id);
        $data = array(
           'title' => 'Trip Report',
           'trip' => $trip,
           'currentTime' => Carbon::now(),               
          'tripdays' => $trip->created_at->diffInDays($trip->updated_at)
                    
    );
  
        //$pdf = PDF::loadView('myPDF', $data);
       return view('trip.tripdetail')->with($data);
    }

    




     

  

    
  


 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'title' => 'Update trip',
            'trip' => tripfuel::find($id),
            'drivers'=> driver::all(),// select * from drivers;
            'fleet'=> fleet::all(),
        );   
    return view('trip.updatetrip')->with($data);
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
     
             'drivername' => 'required',
             'fleetno' => 'required',
             'openingkm' => 'required|max:7',
             'fuelbeforetrip'=>'required|max:4',
             
         ]);
         
 
         $tripdetails = tripfuel::find($id);
         $tripdetails->driver_id = $request->input('drivername');
         $tripdetails->fleet_id = $request->input('fleetno');
         $tripdetails->openingkm = $request->input('openingkm');
         $tripdetails->fuelbeforetrip = $request->input('fuelbeforetrip');       
         $tripdetails->save();
         return redirect('/trip')->with('success','Trip Details Saved');
    }


    public function closetrip(Request $request, $id){
  
    $data = array(
        'title' => 'Close trip',
        'trip' =>   tripfuel::find($id),
        'drivers'=> driver::all(),
        'fleet'=> fleet::all(),
    );   
    return view('trip.closetrip')->with($data);
     
    }
    public function tripend(Request $request, $id)
    {
        $this->validate($request,[
     
         
         
             'closingkm' => 'required|max:7|gt:openingkm',
             'fuelbeforetrip'=>'required|max:4',
             
         ]);
         
 
         $tripdetails = tripfuel::find($id);
         $tripdetails->fuelbeforetrip = $request->input('fuelbeforetrip');
         $tripdetails->closingkm = $request->input('closingkm');;
         $tripdetails->distance = $request->input('distance');;
         $tripdetails->fuelused = $request->input('fuelused');;
         $tripdetails->avgconsumption = $request->input('avgconsumption');;
         $tripdetails->fuelvarience = $request->input('variance');;
         $tripdetails->addtionalfuel = $request->input('addtionalfuel');;//fuel for next trip
         $tripdetails->fuelintank = $request->input('fuelintank');;
         $tripdetails->comment = $request->input('comment');;
         $tripdetails->shortage = $request->input('shortage');
         $tripdetails->closed_at = Carbon::now();
         $tripdetails->tripstatus = 'closed';

        // if($tripdetails->closingkm == 0 ){
        // return redirect('/trip')->with('warning','not possible');
        // return redirect()->back()->with('error',"error ");
        // //}else{
        // dd($tripdetails);
        //$tripdetails->save();
        // }

        //dd($tripdetails);
        
        $tripdetails->save();
        return redirect()->route('trip.show',[ $tripdetails->id ])->with('success','Trip Successfully Closed');
    
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
