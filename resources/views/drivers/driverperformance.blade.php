@extends( 'layouts.base')
@section('content')
@include('layouts.drivermenu')
@include('inc.messages')


<!-- Bootstrap Table with Header - Dark -->





<div class="card" >
    <h5 class="card-header"> {{ $driver->driver_name }}</h5>
    <div class="table-responsive text-nowrap">
    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead class="table-dark">
          <tr>
            <th>Date</th>
            <th>Fleet</th>
            <th>A/Route</th>
            <th>Dash</th>
            <th>Varience</th>
            <th>ReFuelled</th>        
            <th>Dash</th>
            <th>Fuel In Tank</th>
            <th>Fuel To D</th>
            <th>Destination</th>
            <th>Comments</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @if(count($drivertrips) > 0)
            @foreach($drivertrips as $trip)
          <tr>
           
           
            <td>
                {{ $trip->created_at }}
            </td>
            <td>
                {{ $trip->tripfleet->fleetno }}
            </td>

            <td>
               Hre - bbe
                </td>
                <td>
                    dash
                    </td>
                    <td>
                        {{ $trip->fuelvarience }}
                    </td>
                    <td>
                    
                    </td>
                    <td>
                    
                    </td>
                    <td>
                    
                    </td>
                    <td>
                    
                    </td>
              
                    
        
            <td> 
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
            

             
             
             

                  <a class="dropdown-item" href="/drivers/{{$trip->id}}"
                    ><i class="bx bx-edit-alt me-1"></i> View</a
                  >
                   
                  <a class="dropdown-item" href="/drivers/{{$trip->id}}/edit"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  >
               
                  <a class="dropdown-item" href="/drivers/{{$trip->id}}/delete"
                    ><i class="bx bx-trash me-1"></i> Delete</a>
          
                </div>
              </div>
            </td>
          </tr>
     
          @endforeach
          
        
        </tbody>
        
      </table>
   
     
    {{-- </div> --}}
    <br/>  
    {{ $drivertrips->links() }} 
    @else
  
    <p>No drivers found</p>
    @endif

</div>
  </div>

@endsection