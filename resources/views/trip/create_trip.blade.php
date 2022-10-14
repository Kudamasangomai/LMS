@extends('layouts.base')
@section('content')
@include('layouts.tripmenu')
@include('inc.messages')


{{-- consignments --}}
<div class="card mb-4">
    <div class="card-body">
    
       
          {!! Form::open([
          'method' => 'POST' ,
          'action' => 'App\Http\Controllers\TripController@store' ,
          'enctype' => 'multipart/form-data']) 
          !!}
          <div class="row">
            <div class="mb-3 col-md-6">
                @foreach($consignments as $consignments)
              <label for="defaultSelect" class="form-label">Con umber</label>
            
             
              <input
              class="form-control"
              type="text"
                value="{{ $consignments->consignmentno }}"
              id="openingodo"
              name="consignmentno"
            />

          

        
         
              @error('fleetno')
              <p class="alert-danger">
                {{ $message }}
              </p>
              @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="defaultSelect" class="form-label">Fleet No</label>
                <input
                class="form-control"
                type="text"
                  value="   {{ $consignments->fleet->fleetno }}"
                id="openingodo"
                name="fleetno"
              />
                @error('fleetno')
                <p class="alert-danger">
                  {{ $message }}
                </p>
                @enderror
              </div>
              <div class="mb-3 col-md-6">
                <label for="defaultSelect" class="form-label">Driver Name</label>
                <input
                class="form-control"
                type="text"
                  value="     {{ $consignments->driver->driver_name }} "
                id="drivername"
                name="drivername"
              />
                @error('drivername')
                <p class="alert-danger">
                  {{ $message }}
                </p>
                @enderror
              </div>

              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Opening Km</label>
                <input class="form-control"
                  maxlength="10"                   
                  type="number"
                  min="1"
                  name="openingkm"
                 placeholder="Opening Odometer"
                  autofocus
                />
                @error('openingkm')
                <p class="alert-danger">
                  {{ $message }}
                </p>
                @enderror
              </div>

              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Actual Refueling /(Fuel for next trip)</label>
                <input
                  class="form-control"
                  type="number"
               
                  name="fuelbeforetrip"
                 placeholder="Actual Refueling"
                  autofocus
                />
                @error('fuelbeforetrip')
                <p class="alert-danger">
                  {{ $message }}
                </p>
                @enderror
              </div>
              @endforeach

        

        
























            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
              </div>
            {!! Form::close() !!}
    
    </div>
</div>











@endsection
