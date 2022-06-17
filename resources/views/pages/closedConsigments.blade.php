@extends('layouts.base')
@section('content')
@include('layouts.consignmentsmenu')
@include('inc.messages')

<div class="card mb-4">
  
    

    </div>
      <!-- Bootstrap Table with Header - Dark -->
      <div class="card" >
        <h5 class="card-header">Closed Consignments</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th>Consignment No</th>
                <th>Driver</th>
                <th>FleetNo</th>
                <th>Contract</th>
                <th>Date of dispatch</th>
                <th>Submited</th>
                <th> created by</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($closedConsigments) > 0)
                @foreach($closedConsigments as $consignment)
                <tr>
            
             
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                    </i> <strong>{{ $consignment->consignmentno }} </strong>
                </td>
                <td>
                    {{ $consignment->driver->driver_name }} 
                       <!--$consignment->driver['driver_name']--> 
                </td>
                <td>
                    {{ $consignment->fleet->fleetno }}
                </td>
                <td>
                {{ $consignment->contract }}
                </td>
                <td>
                    {{ $consignment->dateofdispatch }}
                    </td>
                    <td>

                       
                      
                          <span class="badge bg-label-primary me-1">    {{ $consignment->submitted }}
                  

                        



                     </span>
                        </td>
                        <td>
                            {{ $consignment->user->name }}
                          <!--onsignment->closedbyf['name']-->
                            </td>
            
                <td> 
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      @if ( $consignment->submitted == 'Submitted' 
                      || $consignment->submitted == 'Pending' && Auth::user()->roles == 3 )
                     
                          
                     
                      <a class="dropdown-item" href="/consignments/{{$consignment->id}}"
                        ><i class="bx bx-edit-alt me-1"></i> View</a
                      >
                      @else
                 

                      <a class="dropdown-item" href="/consignments/{{$consignment->id}}"
                        ><i class="bx bx-edit-alt me-1"></i> View</a
                      >
                       
                      <a class="dropdown-item" href="/consignments/{{$consignment->id}}/edit"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="/consignments/{{$consignment->id}}/close"
                      ><i class="bx bx-trash me-1"></i> Close trip </a>
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-1"></i> Delete</a>
                        @endif
                    </div>
                  </div>
                </td>
            
              </tr>
         
              @endforeach
              
            
            </tbody>
            
          </table>
       
         
        </div>
        <br/>  
        {{ $closedConsigments->links() }} 
        @else
      
        <p>No consignments found</p>
        @endif


      </div>
      <!--/ Bootstrap Table with Header Dark -->
@endsection