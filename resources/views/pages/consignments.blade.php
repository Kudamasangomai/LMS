@extends('layouts.base')
@section('content')
@include('layouts.consignmentsmenu')
@include('inc.messages')

<link href="{{ asset('assets/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" 
rel="stylesheet">
<link href="{{ asset('assets/jquery-datatable/skin/bootstrap/css/buttons.datatable.min.css')}}" 
rel="stylesheet">
<link href="{{ asset('assets/jquery-datatable/skin/bootstrap/css/dataTables.min.css')}}" 
rel="stylesheet">

<style>
  .dataTables_info{
   display: none;
  }
.dataTables_paginate{
  display: none;
}
</style>

{!! Form::open([
  'class'=>'form-inline',
  'method' => 'GET' ,
  'action' => 'App\Http\Controllers\ConsignmentController@search' ,
  'enctype' => 'multipart/form-data'])
!!}

  <div class="input-group">
    <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
    <input type="text" name="search" class="form-control" placeholder="Search..." />
  </div>
  {!! Form::close() !!}
  <br>
      <!-- Bootstrap Table with Header - Dark -->
      <div class="card" >
        <h5 class="card-header">list of consignments </h5>
        {{-- <div class="table-responsive text-nowrap"> --}}
          <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead class="table-dark">
              <tr>
                <th>Consignment No</th>
                <th>Date of dispatch</th>
                <th>Driver</th>
                <th>FleetNo</th>
                <th>Contract</th>
       
                <th>Submited</th>
                <th> created by</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($consignments) > 0)
                @foreach($consignments as $consignment)
             
              
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                    </i> <strong>{{ $consignment->consignmentno }} </strong>
                </td>
                <td>
                  {{  \Carbon\Carbon::parse($consignment->dateofdispatch)->year(now()->format('Y'))->format('Y-m-d') }}
               
                  </td>
                <td>
                    {{ $consignment->driver->driver_name }} 
        
                </td>
                <td>
                    {{ $consignment->fleet->fleetno }}
                </td>
                <td>
                {{ $consignment->contract }}
                </td>
             
                    <td>

                       
                      
                <span class="badge bg-label-primary me-1">    {{ $consignment->submitted }}</span>
                @if ( $consignment->accrecieved == 1 && $consignment->submitted =='Submitted')
                <span class="badge badge-center rounded-pill bg-success">.</span>    
                @elseif ( $consignment->accrecieved == 0 && $consignment->submitted =='Submitted')
                <span class="badge badge-center rounded-pill bg-warning">.</span>   
                @endif
                                  
         
                      <p>
                        
                       
                
                      </p>
                    
                        </td>
                        <td>
                            {{ $consignment->user->name }}
                   
                            </td>
            
                <td> 
                  <div class="dropdown">
                    
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">

                      @if ( $consignment->submitted == 'Submitted' || $consignment->submitted == 'Cancelled' && Auth::user()->roles == 3 )
                       <a class="dropdown-item" href="/consignments/{{$consignment->id}}/consignmentrecieved"
                        ><i class="bx bx-edit-alt me-1"></i> Received</a>
                        <a class="dropdown-item" href="/consignments/{{$consignment->id}}"
                          ><i class="bx bx-edit-alt me-1"></i> View</a>
                    
                      
                      @else
                 
                          @if(Auth::user()->roles < 4 )

                          @else
                      <a class="dropdown-item" href="/consignments/{{$consignment->id}}"
                        ><i class="bx bx-edit-alt me-1"></i> View</a>
                       
                      <a class="dropdown-item" href="/consignments/{{$consignment->id}}/edit"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a>

                      <a class="dropdown-item" href="/consignments/{{$consignment->id}}/close"
                      ><i class="bx bx-trash me-1"></i> Close Consigment </a>
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-1"></i> Delete</a>
                        @endif
                        @endif

                        <a class="dropdown-item" href="/trip/{{$consignment->consignmentno}}/create"
                          ><i class="bx bx-edit-alt me-1"></i> Create Trip</a>
                    </div>
                    
                 



                  </div>
                </td>
              </tr>
         
              @endforeach
              
            
            </tbody>
            
          </table>
       
         
        </div>
        <br/>  
        {{ $consignments->links() }} 
        @else
      
        <p>No consignments found</p>
        @endif


      </div>
      
      <script src="{{ asset('assets/jquery-datatable/jquery.js') }}"></script>      
      <script src="{{ asset('assets/jquery-datatable/jquery.dataTables.js') }}"></script>
      <script src="{{ asset('assets/jquery-datatable/jquery.dataTables.min.js') }}"></script>

      <script src="{{ asset('assets/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
      <script src="{{ asset('assets/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>    
      <script src="{{ asset('assets/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
      <script src="{{ asset('assets/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
      <script src="{{ asset('assets/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
      <script src="{{ asset('assets/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
      <script src="{{ asset('assets/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
      <script src="{{ asset('assets/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
      {{-- <script src="{{ asset('assets/jquery-datatable/jquery-datatable.js') }}"></script> --}}

<script>
       $(document).ready(function() {
                $('.js-exportable').dataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                     ]
                } );
            } );
            
            
            
            </script>
           
      @endsection
    