<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\consignment;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Facades\DB as DB;
use Carbon\Carbon;

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
        
    $current = Carbon::now()->format('M-Y');
    $total_consignment = consignment::WhereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->count();
    $submitted_consignment = consignment::WhereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))
                        ->where('submitted', 'Submitted')->count();
    $pending_consignment = consignment::WhereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))
                        ->where('submitted', 'pending')->count();
    $cancelled_consignment = consignment::WhereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))
                        ->where('submitted', 'Cancelled')->count();

                        
     $created_consignments_chart = [
            'chart_title'        => 'Cosignments Created Per month',
            'report_type'        => 'group_by_date',
            'model'              => 'App\Models\consignment',        
            'group_by_field'     => 'created_at',
            'group_by_period'    => 'month',
            'filter_field'       =>'submitted',
            'chart_type'         => 'line',  
            'chart_color'        => '250,100,100',
           
        ];
        
      
        
        $consignments_chart = new LaravelChart($created_consignments_chart); 
              

        $chart_options = [
            'chart_title' => 'Consignments /month',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\consignment',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'chart_color' =>'50,100,245',
          
        ];
        $settings2 = [
            'chart_title'           => 'Pending',
            'chart_type'            => 'bar',
            'report_type'           =>'group_by_date',
            'model'                 => 'App\Models\consignment',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'month',
            'filter_field'          =>'Submitted=Pending',
            'chart_color'           =>'250,100,100',
            
            ];    
       
        $chart1 = new LaravelChart($chart_options,   $settings2);
    	return view('pages.dashboard',compact(
            'chart1',
            'consignments_chart',
            'total_consignment',
            'submitted_consignment',
            'pending_consignment',
            'cancelled_consignment',
            'current'
        ));
    }
}
