@extends('layouts.base')
@section('content')
@include('layouts.consignmentsmenu')
@include('inc.messages')


<div class="card mb-4">
    <h5 class="card-header">{{ $consignment->driver->driver_name }}</h5>
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
          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
            <span class="d-none d-sm-block">Upload new photo</span>
            <i class="bx bx-upload d-block d-sm-none"></i>
            <input
              type="file"
              id="upload"
              class="account-file-input"
              hidden
              accept="image/png, image/jpeg"
            />
          </label>
          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
            <i class="bx bx-reset d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Reset</span>
          </button>

          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
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
          <table class="table table-striped table-borderless border-bottom">
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

@endsection