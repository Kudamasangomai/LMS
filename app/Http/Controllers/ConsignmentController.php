<?php

namespace App\Http\Controllers;

use App\Models\consignment;
use App\Models\driver;
use App\Models\fleet;
Use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ConsignmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the all consignments
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $title = 'Consignments';      
        
        if(auth()->user()->roles == 3)
        {
            $consignments = consignment::where('Submitted','not like', '%Pending%')->paginate(10);
            return view('pages.consignments',compact('title','consignments'));
        }else
        {
            $consignments = consignment::orderBy('dateofdispatch', 'desc')->paginate(10);
            return view('pages.consignments',compact('title','consignments'));
        }
  
   
    }

    /**
     * Show the form/page for creating a new consignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $data = array(
            'title' =>  'Create Consignments',
            'drivers' => driver::all(), // select * from drivers;
            'fleet'=> fleet::all(),
            //'fleet' => DB::select('SELECT * FROM consignments,fleets where consignments.fleetno = fleets.id and not consignments.Submitted= "Pending" '),
            'closedConsigments' => consignment::where('fleetno', 'fleet'),
        

        );
        //dd($data);
        return view('pages.createconsignments')->with($data);
    }

    /**
     * Store a newly created consignment in the databse.
     *were validation takes place 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'consignmentno' => 'required|unique:consignments|max:6',
            'drivername' => 'required',
            'fleetno' => 'required',
            'contract' => 'required',
            'loadingpoint' => 'required',
            'offloadingpoint' => 'required',
            'comment' => 'required',

        ]);
        $consignment = new consignment();
        $consignment->consignmentno = $request->input('consignmentno');
        $consignment->drivername = $request->input('drivername');
        $consignment->fleetno = $request->input('fleetno');
        $consignment->contract = $request->input('contract');
        $consignment->loadingpoint = $request->input('loadingpoint');
        $consignment->offloadingpoint = $request->input('offloadingpoint');
        $consignment->comment = $request->input('comment');
        $consignment->submitted = "Pending";
        $consignment->dateofdispatch = $request->input('dateofdispatch');
        $consignment->user_id = auth()->user()->id;
        $consignment->closedby = 0;
        $consignment->accrecieved = 0;
        $consignment->accuserclosedby = 0;

        $test = $request->input('fleetno');
        $query = DB::select('SELECT * FROM consignments,fleets 
        where consignments.fleetno = '.$test.' and consignments.Submitted= "Pending" ');
        
        if($query)
        {
            return redirect('/consignments/create')->with('fleeterror', 'The Truck you Select is Still In Transit')
            ->withInput($request->all());
       
        }else{
            $consignment->save();
             return redirect('/consignments')->with('success', 'Consignment Created');
        }
        

      
    }

    /**
     * Display the specified consignment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = array(
            'title' => 'Consignment Detail',
            'consignment' => consignment::find($id),
        );
        return view('pages.consignmentinfo')->with($data);
    }

    /**
     * Show the form for editing the specified consignment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'title' => ' Edit Consigment',
            'consignment' => consignment::find($id),
            'drivers' => driver::all(),
            'fleet' => fleet::all(),
        );
        return view('pages.editconsignment')->with($data);
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
        $this->validate($request, [
            'consignmentno' => 'required|max:6',
            'drivername' => 'required',
            'fleetno' => 'required',
            'contract' => 'required',
            'loadingpoint' => 'required',
            'offloadingpoint' => 'required',


        ]);
        $consignment = consignment::find($id);
        $consignment->consignmentno = $request->input('consignmentno');
        $consignment->drivername = $request->input('drivername');
        $consignment->fleetno = $request->input('fleetno');
        $consignment->contract = $request->input('contract');
        $consignment->loadingpoint = $request->input('loadingpoint');
        $consignment->offloadingpoint = $request->input('offloadingpoint');
        $consignment->dateofdispatch = $request->input('dateofdispatch');
        // $consignment->user_id = auth()->user()->id;

        $consignment->save();
        return redirect()->route('consignments.show',[ $consignment->id ])->with('success',' Consignment Successfully Updated');
    }




    public function close($id)
    {
        //Show the form for editing the specified consignment.
        $data = array(
            'title' => ' Close Consigment',
            'consignment' => consignment::find($id),
        );

        return view('pages.closeconsignment')->with($data);
    }

    public function closecon(Request $request, $id)
    {
        /** closing the trip or consigment */
        $this->validate($request, [

            'submitted' => 'required',
            'comment' => 'required',

        ]);
        $consignment = consignment::find($id);
        $consignment->comment = $request->input('comment');
        $consignment->submitted =  $request->input('submitted');
        $consignment->closedby = auth()->user()->id;

        $consignment->save();
        return redirect('/consignments')->with('success', 'Consignment Closed');
    }

    public function closedConsigments()
    {
        $data = array(
            'title' => 'Closed Consigments',
            'closedConsigments' => consignment::where('submitted', 'Submitted')->paginate(10),

        );
        return view('pages.closedConsigments')->with($data);
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $title = 'Searched Data';
        $consignments = consignment::query()
              ->where('consignmentno', 'LIKE', '%' . $search . '%')
              ->orWhereHas('driver', function($query) use($search){
                $query->where('driver_name', 'like', '%' . $search. '%');})
             ->orWhereHas('fleet', function($query) use($search){
                $query->where('fleetno', 'like', '%' . $search. '%');})
              
             ->paginate(10);      

        return view('pages.consignments',compact('consignments','title'));
    }

    public function consignmentrecieved($id)
    {
        $data = array(
            'title' => 'Consignment Detail',
            'consignment' => consignment::find($id),
        );
        return view('pages.confirmconsignmentrecieved')->with($data);
    }

    public function accrecievedconsignment(Request $request, $id)
    {
        $this->validate($request, [

            // 'accrecieved ' => 'required',


        ]);

        $dater = new DateTime();
        $consignment = consignment::find($id);
        $consignment->accrecieved = 1;
        $consignment->accuserclosedby = auth()->user()->id;
        $consignment->dateaccountsrecieved = $dater;

        $consignment->save();
        //return redirect('/consignments/closedConsigments')->with('success', 'Consignment Recieved');
        return redirect()->route('consignments.show',[ $consignment->id ])->with('success',' Consignment Successfully Recieved');
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
