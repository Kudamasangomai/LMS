@extends( 'layouts.base')
@section('content')
@include('layouts.drivermenu')
@include('inc.messages')



   

    <div class="row">
      <div class="col-md-12">       
        {!! Form::open([
          'method' => 'PUT' ,
          'action' => ['App\Http\Controllers\DriverController@update',$driver->id ],
          'enctype' => 'multipart/form-data']) 
          !!}
        <div class="card mb-4">
          <div class="row">
            <div class="mb-3 col-md-6">
          <h5 class="card-header">{{ $driver->driver_name}} Profile Details </h5>
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
            </div>
            <div class="mb-3 col-md-6">
              <h5 class="card-header"> Driver Summary Details </h5>
              <div class="card-body">
               Total Trips :{{ $totaltrips->count() }}
              </div>
              
               
                <button type="button" class="btn btn-primary">
                  <a style="float: right;color:white;" href="/drivers/{{$driver->id}}/driverperfomance"
                    ><i class="bx bx-link-alt me-1"></i> View </a>
                </button>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            <form id="formAccountSettings" method="POST" onsubmit="return false">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input
                    class="form-control"
                    type="text"
                    id="firstName"
                    name="drivername"
                    value="{{ $driver->driver_name}}" 
                    autofocus
                  />
                  @error('driverid')
                  <p class="alert-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="mb-3 col-md-6">
                  <label for="state" class="form-label">Driver ID </label>
                  <input class="form-control" type="text"
                   id="state" 
                   name="driverid"
                   value="{{ $driver->driver_id_no }}"
                    placeholder="California" />
                    @error('driverid')
                    <p class="alert-danger">
                      {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  <input
                    class="form-control"
                    type="text"
                    id="email"
                    name="driveremail"
                    value="{{ $driver->driver_email }}"
                   
                  />
                  @error('driveremail')
                  <p class="alert-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="mb-3 col-md-6">
                  <label for="organization" class="form-label">License</label>
                  <input
                    type="text"
                    class="form-control"
                    id="organization"
                    name="driverlicenseno"
                    value="{{ $driver->driver_license_no }}"
                  />
                  @error('driverlicenseno')
                  <p class="alert-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text">Zim (+263)</span>
                    <input
                      type="text"
                      id="phoneNumber"
                      name="driverphonenumber"
                      class="form-control"
                      value="{{ $driver->driver_phonenumber }}"
                 
                    />
                  </div>
                  @error('driverphonenumber')
                  <p class="alert-danger">
                    {{ $message }}
                  </p>
                  @enderror
                </div>
                <div class="mb-3 col-md-6">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" 
                  id="address" 
                  name="address"
                  value="{{ $driver->driver_res_place }}"
                   placeholder="Address" />
                   @error('address')
                   <p class="alert-danger">
                     {{ $message }}
                   </p>
                   @enderror
                </div>
               
              
                
                
                
               
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
              </div>
              {!! Form::close() !!}
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
              <button type="submit" class="btn btn-danger deactivate-account">

                <a href="/drivers/{{$driver->id}}/delete" style="color: white">
                Delete Account
              </a>
              </button>

            </form>
          
          </div>
        </div>
      </div>
    </div>





@endsection