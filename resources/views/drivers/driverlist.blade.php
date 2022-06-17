@extends( 'layouts.base')
@section('content')
@include('layouts.drivermenu')
@include('inc.messages')



<div class="card" >
    <h5 class="card-header">list of drivers</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>driver No</th>
            <th>Driver Name</th>
            <th>id Number</th>
            <th>created at</th>
            <th>updated at</th>
            <th>Phone number</th>
        
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @if(count($drivers) > 0)
            @foreach($drivers as $driver)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i> <strong>{{ $driver->id }} </strong>
            </td>
            <td>
                {{ $driver->driver_name }} 
                
            </td>
            <td>
                {{ $driver->driver_id_no }}
            </td>
            <td>
            {{ $driver->driver_phonenumber }}
            </td>

            <td>
                {{ $driver->created_at }}
                </td>
                <td>
                    {{ $driver->updated_at }}
                    </td>
         
              
                    
        
            <td> 
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
            

             
             
             

                  <a class="dropdown-item" href="/drivers/{{$driver->id}}"
                    ><i class="bx bx-edit-alt me-1"></i> View</a
                  >
                   
                  <a class="dropdown-item" href="/drivers/{{$driver->id}}/edit"
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
    {{ $drivers->links() }} 
    @else
  
    <p>No drivers found</p>
    @endif


  </div>

  @endsection