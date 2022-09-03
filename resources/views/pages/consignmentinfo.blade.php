@extends('layouts.base')
@section('content')
@include('layouts.consignmentsmenu')
@include('inc.messages')
<style>
  .dataTables_info{
   display: none;
  }
.dataTables_paginate{
  display: none;
}

.dataTables_filter{
  display: none;
}
</style>
<link href="{{ asset('assets/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" 
rel="stylesheet">

<link href="{{ asset('assets/jquery-datatable/skin/bootstrap/css/buttons.datatable.min.css')}}" 
rel="stylesheet">
<link href="{{ asset('assets/jquery-datatable/skin/bootstrap/css/dataTables.min.css')}}" 
rel="stylesheet">
<div class="card mb-4">

    <!-- Account -->
    <div class="card-body">
      <div class="d-flex align-items-start align-items-sm-center gap-4">
        <img
          src="../assets/img/avatars/1.png"
          alt="user-avatar"
          class="d-block rounded"
          height="100"
          width="100"
          id="uploadedAvatar"
        />
        <div class="button-wrapper">
       
        

          <h5 class="card-header">{{ $consignment->driver->driver_name }}</h5>
        </div>
      </div>
    </div>
    <hr class="my-0" />
    <div class="card-body">
    
      <div class="card">
        <!-- Notifications -->
        <h5 class="card-header">Consignment Details</h5>
        <div class="card-body">
  
          
          <div class="error"></div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
              <tr>
                <th class="text-nowrap"></th>
                <th class="text-nowrap"></th>
                <th class="text-nowrap"> </th>
                <th class="text-nowrap"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-nowrap"></td>
                <td class="text-nowrap">Consignment No</td>
                <td class="text-nowrap">{{ $consignment->consignmentno }}</td>
                <td class="text-nowrap"></td>               
              </tr>
              <tr>
                <td class="text-nowrap"></td>
                <td class="text-nowrap">Driver</td>
                <td class="text-nowrap">{{ $consignment->driver->driver_name }}</td>
                <td class="text-nowrap"></td>               
              </tr>
              <tr>
                <td class="text-nowrap"></td>
                <td class="text-nowrap">Date Of Dispatch</td>
                <td class="text-nowrap">{{ $consignment->dateofdispatch }}</td>
                <td class="text-nowrap"></td>               
              </tr>
              <tr>
                <td class="text-nowrap"></td>
                <td class="text-nowrap">Loading & offloadingPoint </td>
                <td class="text-nowrap">{{ $consignment->loadingpoint }} to {{ $consignment->offloadingpoint }}</td>
                <td class="text-nowrap"></td>               
              </tr>
              <tr>
                <td class="text-nowrap"></td>
                <td class="text-nowrap">Submitted</td>
                <td class="text-nowrap">{{ $consignment->submitted }}</td>
                <td class="text-nowrap"></td>               
              </tr>
              <tr>
                <td class="text-nowrap"></td>
                <td class="text-nowrap">Comment</td>
                <td class="text-nowrap">{{ $consignment->comment }}</td>
                <td class="text-nowrap"></td>               
              </tr>
              <tr>
                <td class="text-nowrap"></td>
                <td class="text-nowrap">Account Received</td>
                <td class="text-nowrap">
                  @if ($consignment->accrecieved == 0)
                      No
                      @else
                      Yes by {{ $consignment->accountuser->name }} on {{ $consignment->dateaccountsrecieved }} 
                  @endif
              
                </td>
                <td class="text-nowrap"></td>               
              </tr>
              
           
             
            </tbody>
          </table>
        </div>
        <div class="card-body">
       
    
            <div class="row">
             
              <div class="mt-4">
          
                <button type="reset" class="btn btn-info"><a  href="/consignments/{{$consignment->id}}/edit"> Edit</a></button>
                <button type="reset" class="btn btn-outline-secondary">Print</button>
              </div>
            </div>
    
        </div>
        <!-- /Notifications -->
 

    <!-- /Account -->
  </div>
  <script src="{{ asset('assets/jquery-datatable/jquery.js') }}"></script>
      
  <script src="{{ asset('assets/jquery-datatable/jquery.dataTables.js') }}"></script>

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
            $('.js-exportable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
            } );
        } );
        
        
        
        </script>
       
@endsection