<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\consignment;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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
        // $fruit = User::where('roles',9)->get();
    	// $veg = User::where('roles',3)->get();    	
    	// $fruit_count = count($fruit);    	
    	// $veg_count = count($veg);

        $chart_options = [
            'chart_title' => 'Users Created Per month',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'chart_color' =>'0,255,255',
          
        ];
        $chart1 = new LaravelChart($chart_options);
        
        $consignments_chart = [
            'chart_title' => 'Cosignments Created Per month',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\consignment',
            'group_by_field' => 'updated_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'conditions'            => [
            ['name' => 'Submitted', 'condition' => 'submitted = Submitted', 'color' => 'black', 'fill' => true],
  
            ],
        ];

        // $consignments_chart2 = [
          
        //     'chart_title' => 'Cosignments Created Per month',
        //     'report_type' => 'group_by_string',
        //     'model' => 'App\Models\consignment',
        //     'group_by_field' => 'submitted',
        //     //'group_by_period' => 'month',
        //     'chart_type' => 'line',
        //     'conditions'            => [
            
        //     ['name' => 'Transport', 'condition' => 'submitted = Cancelled', 'color' => 'blue', 'fill' => true],
        //     ],
        // ];
        $consignments_chart = new LaravelChart($consignments_chart);
    	
    	
    	return view('pages.dashboard',compact('chart1','consignments_chart'));
    
     
        // return view('pages.dashboard');
    }
}
