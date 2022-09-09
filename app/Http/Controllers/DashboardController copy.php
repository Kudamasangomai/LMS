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
    $total_consignment = consignment::WhereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->count();
    $submitted_consignment = consignment::WhereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))
                        ->where('submitted', 'Submitted')->count();
    $pending_consignment = consignment::WhereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))
                        ->where('submitted', 'pending')->count();
    $cancelled_consignment = consignment::WhereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))
                        ->where('submitted', 'Cancelled')->count();

              

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
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
             'field_distinct'        =>'Pending',
            // 'group_by_field'        => 'Submitted',       
            'filter_field'          =>'created_at',
            // 'filter_period'         => 'month',
            'chart_color'          =>'250,100,100',
            
            ];    
       
        $chart1 = new LaravelChart($chart_options,   $settings2);
        


        
        $consignments_chart = [
            'chart_title' => 'Cosignments Created Per month',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\consignment',
            'group_by_field' => 'dateofdispatch',
            'group_by_period' => 'month',
            'filter_field'=>'submitted',
            'chart_type' => 'line',
            'conditions'            =>
             [
            ['name' => 'Pending', 'condition' => 'submitted = submitted', 'color' => 'black', 'fill' => false],
            ['name' => 'Latvia ', 'condition' => 'submitted = submitted', 'color' => 'blue','fill' => false],

            ],

          
         
           
            
        ];$consignments_chart = new LaravelChart($consignments_chart); 
        
        
        $record = consignment::select(DB::raw("COUNT(*) as count"), DB::raw("YEAR(created_at) as year"), DB::raw("MONTH(created_at) as month"))
        ->where('submitted', '=','Pending')->groupBy('year','month')->orderBy('month')->get();
       
        $record2 = consignment::select(DB::raw("COUNT(*) as count"), DB::raw("YEAR(created_at) as year"), DB::raw("MONTH(created_at) as month"))
        ->where('submitted', '=','Submitted')->groupBy('year','month')->orderBy('month')->get();


         $data = [];    
         foreach($record as $row) {
            $data['label'][] = $row->month;
            $data['data'][] = (int) $row->count;
          }
       
    
        $chart_data = json_encode($data);
    
        


    	return view('pages.dashboard',compact(
            'chart1',
            'consignments_chart','chart_data',
            'total_consignment','submitted_consignment','pending_consignment','cancelled_consignment'
        ));
    }
}
