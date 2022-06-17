@extends( 'layouts.base')
@section('content')
@include('layouts.fleetmenu')
@include('inc.messages')



<div class="card" >
    <h5 class="card-header">list of Trucks</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>fleet No</th>
            <th>fleet Name</th>
            <th>Reg Number</th>
            <th>created at</th>
            <th>updated at</th>
            
        
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @if(count($fleets) > 0)
            @foreach($fleets as $fleet)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3">
                </i> <strong>{{ $fleet->id }} </strong>
            </td>
            <td>
                {{ $fleet->fleetno }} 
                
            </td>
            <td>
                {{ $fleet->regno }}
            </td>
         

            <td>
                {{ $fleet->created_at }}
                </td>
                <td>
                    {{ $fleet->updated_at }}
                    </td>
         
              
                    
        
            <td> 
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
            

             
             
             

                  <a class="dropdown-item" href="/fleets/{{$fleet->id}}"
                    ><i class="bx bx-edit-alt me-1"></i> View</a
                  >
                   
                  <a class="dropdown-item" href="/fleets/{{$fleet->id}}/edit"
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
    {{ $fleets->links() }} 
    @else
  
    <p>No fleets found</p>
    @endif


  </div>

  @endsection