@extends( 'layouts.base')
@section('content')
@include('layouts.drivermenu')
@include('inc.messages')


<div class="container-xxl flex-grow-1 container-p-y">
    {!! Form::open([
        'method' => 'PUT' ,
        'action' => ['App\Http\Controllers\DriverController@update',$driver->id ],
        'enctype' => 'multipart/form-data']) 
        !!}
        
        <div class="row">
      <div class="mb-3 col-md-6">
        <label for="html5-number-input" class="col-md-6 col-form-label">Driver Name</label>
       
          <input class="form-control" 
          maxlength="50" 
          type="text" 
          name="drivername"
          value="{{ $driver->driver_name}}" 
          id="html5-number-input" 
         
          /> 
          @error('drivername')
          <p class="alert-danger">
            {{ $message }}
          </p>
          @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="html5-number-input" class="col-md-6 col-form-label">Driver ID</label>
       
          <input class="form-control" 
          maxlength="10" 
          type="text" 
          min="1" 
          name="driverid"
          value="{{ $driver->driver_id_no}}" 
          id="html5-number-input" 
         
          />
        
      
    </div>
    <div class="mb-3 col-md-6">
        <label for="html5-number-input" class="col-md-6 col-form-label">Phone number</label>
       
          <input class="form-control" 
          maxlength="10" 
          type="text" 
          min="1" 
          name="driverphonenumber"
          value="{{ $driver->driver_phonenumber}}" 
          id="html5-number-input" 
         
          />
        
      
    </div>
    <div class="mt-2">
        {{-- {{ Form::hidden('_method','PUT')}} --}}
        <button type="submit" class="btn btn-info me-2">Save changes</button>
        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
      </div>
      {!! Form::close() !!}
</div>
</div>
@endsection