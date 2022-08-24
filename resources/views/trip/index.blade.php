@extends( 'layouts.base')
@section('content')
@include('layouts.tripmenu')
@include('inc.messages')


<div class="card" >
    <h5 class="card-header">List of Trip</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>Date </th>
            <th>Fleet</th>
            <th>Driver</th>
            <th>Route</th>
            <th>Openning Km</th>
            <th>Closing Km</th>
            <th>Distance  Km</th>
            <th>Fuel Used Km</th>
            <th>Consumption Km</th>
            <th>Actual Refuelling</th>
            <th>Varience</th>
            <th>Additional Fuel</th>
            <th>Total In tank</th>
            <th>Comment</th>
            <th>shortage</th>
        
           
         
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @if(count($trip) > 0)
            @foreach($trip as $tripinfo)
          <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->created_at }} 
                </td>
                 <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->tripfleet->fleetno }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                      </i>    {{ $tripinfo->tripdriver->driver_name }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                    </i>  route   
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->openingkm }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->closingkm }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->distance }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->fuelused }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->avgconsumption }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->fuelbeforetrip }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->fuelvarience }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->addtionalfuel }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->fuelintank }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->comment }}  
                </td>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i>  {{ $tripinfo->shortage }}  
                </td>
              
           
           

                
         
              
                    
        
            <td> 
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
            

             
             
             

                  <a class="dropdown-item" href="/trip/{{$tripinfo->id}}"
                    ><i class="bx bx-edit-alt me-1"></i> View</a
                  >
                   
                  <a class="dropdown-item" href="/trip/{{$tripinfo->id}}/edit"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  >
               
                  <a class="dropdown-item" href="javascript:void(0);"
                    ><i class="bx bx-trash me-1"></i> Delete</a>
          
                </div>
              </div>
            </td>
          </tr>
     
          @endforeach
          
        
        </tbody>
        
      </table>
   
     
    </div>
    <br/>  
    {{ $trip->links() }} 
    @else
  
    <p>No trips found</p>
    @endif


  </div>


  
@endsection
