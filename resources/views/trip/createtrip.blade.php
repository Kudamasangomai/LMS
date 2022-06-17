@extends('layouts.base')
@section('content')
@include('layouts.tripmenu')
@include('inc.messages')



<div class="card mb-4">
    <div class="card-body">
    
       
          {!! Form::open([
          'method' => 'POST' ,
          'action' => 'App\Http\Controllers\TripController@store' ,
          'enctype' => 'multipart/form-data']) 
          !!}
          <div class="row">

            <div class="mb-3 col-md-6">
                <label for="defaultSelect" class="form-label">Fleet No</label>
                <select name="fleetno" id="defaultSelect" class="form-select">
                  @foreach($fleet as $fleet)
                  <option value="{{ $fleet->id }}">{{ $fleet->fleetno }}</option>
              
              @endforeach
                </select>
                @error('fleetno')
                <p class="alert-danger">
                  {{ $message }}
                </p>
                @enderror
              </div>
              <div class="mb-3 col-md-6">
                <label for="defaultSelect" class="form-label">Driver Name</label>
                <select name="drivername" id="defaultSelect" class="form-select">
                  @foreach($drivers as $drivers)
                  <option value="{{ $drivers->id }}">{{ $drivers->driver_name }}</option>
              @endforeach
                </select>
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

























            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
              </div>
            {!! Form::close() !!}
    
    </div>
</div>











@endsection
