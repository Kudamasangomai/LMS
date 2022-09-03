@extends( 'layouts.base')
@section('content')
@include('layouts.usersmenu')
@include('inc.messages')




<div class="row">
    <div class="col-md-12">       
      {!! Form::open([
        'method' => 'POST' ,
        'action' => ['App\Http\Controllers\UserController@store' ],
        'enctype' => 'multipart/form-data']) 
        !!}
      <div class="card mb-4">
        <h5 class="card-header"> Profile Details</h5>
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
          
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">First Name</label>
                <input
                  class="form-control"
                  type="text"
                  id="firstName"
                  name="name"
                  placeholder="First and lastnames "
                  value="{{ old('name') }}" 
                  autofocus
                />
                @error('name')
                <p class="alert-danger">
                  {{ $message }}
                </p>
                @enderror
              </div>
              <div class="mb-3 col-md-6">
                <label for="state" class="form-label">User Role </label>
                <select name="role" id="defaultSelect" class="form-select">
                
                 


                  @for($i = 1; $i < 10 ; $i++)
                  <option value="{{ $i }}">{{ $i; }}</option>
                  @endfor
                </select>
                  @error('role')
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
                  name="email"
                  value="{{ old('email') }}"
                  placeholder="example@gmail.com "
                 
                />
                @error('email')
                <p class="alert-danger">
                  {{ $message }}
                </p>
                @enderror
              </div>
           
         
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Password</label>
                <input
                  class="form-control"
                  type="password"
                  id="email"
                  name="password"
                  value="{{ old('password') }}"
                  placeholder="wkP219!!@"
                 
                />
                @error('password')
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
      
    </div>
  </div>









@endsection