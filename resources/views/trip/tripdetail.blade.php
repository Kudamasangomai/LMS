@extends( 'layouts.base')
@section('content')
@include('layouts.tripmenu')
@include('inc.messages')


<div class="row">
    <div class="col-md-12">       
     
        <div class="card">
           <center><h3 class="card-header center">Blue Star Logistics</h3></center>
          <center> <h4>{{ $title }}</h4> </center>
            <div class="table-responsive text-nowrap">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Trip No </th>
                    <th>Driver</th>
                    <th>Pay No</th>
                    <th>Horse</th>
                    <th>Date Produced </th>
                 
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $trip->id }}</strong></td>
                    <td>{{ $trip->tripdriver->driver_name }}</td>
                    <td>
                     {{ $trip->driver_id }}
                    </td>
                    <td><span class="badge bg-label-primary me-1">{{ $trip->tripfleet->fleetno }}</span></td>
                    <td><span class="badge bg-label-primary me-1">{{ $currentTime }}</span></td>
                   
                  </tr>
                  <tr><td colspan="5"></td></tr>   
                            
                  <tr style='text-align:center'> 
                    <td colspan="5">  Hre-JHB-HRE </td>
                  </tr>
                  <tr>
                    <td>Trip Start</td><td>{{ $trip->created_at }} </td><td>Trip End</td><td>{{ $trip->updated_at }}</td><td>Trip Days  {{ $tripdays }}</td>
                  </tr>

                  <tr>
                    <td colspan="5"></td>
                  </tr>
                  <tr style='text-align:center'>
                    <th colspan="5">Trip Overview </th>
                  </tr>
                 
                    <tr><td></td><td colspan="2"> Distance travelled</td><td> {{ $trip->distance }}  </td><td></td></tr>
                    <tr><td></td><td colspan="2" > Fuel Used</td><td >{{ $trip->fuelused }}  </td><td></td></tr>
                    <tr><td></td><td colspan="2">Average Cons</td><td >{{ $trip->avgconsumption }} </td><td></td></tr>
                    
                
                  
                </tbody>
              </table>
            </div>
          </div>
          <!--/ Striped Rows -->

    </div>
</div>

@endsection