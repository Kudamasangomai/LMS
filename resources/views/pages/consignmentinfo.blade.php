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
      <form id="formAccountSettings" method="POST" onsubmit="return false">
        <div class="row">
          <div class="mb-3 col-md-6">
            <label for="firstName" class="form-label">Consignment No</label>
            <input
              class="form-control"
              type="text"
              id="firstName"
              name="firstName"
              value="{{  $consignment->consignmentno}}"
              autofocus
            />
          </div>
          <div class="mb-3 col-md-6">
            <label for="lastName" class="form-label">Last Name</label>
            <input class="form-control"
             type="text" 
             name="lastName" id="lastName" 
               value="{{  $consignment->contract }}" />
          </div>
       
    
     
          
         
        
       
          
         
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Save changes</button>
          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
        </div>
      </form>
    </div>
    <!-- /Account -->
  </div>
  <div class="card">
    <h5 class="card-header">Delete Account</h5>
    <div class="card-body">
      <div class="mb-3 col-12 mb-0">
        <div class="alert alert-warning">
          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
        </div>
      </div>
      <form id="formAccountDeactivation" onsubmit="return false">
        <div class="form-check mb-3">
          <input
            class="form-check-input"
            type="checkbox"
            name="accountActivation"
            id="accountActivation"
          />
          <label class="form-check-label" for="accountActivation"
            >I confirm my account deactivation</label
          >
        </div>
        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
      </form>
    </div>
  </div>
@endsection