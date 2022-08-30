@extends('layouts.base')
@section('content')
@include('layouts.tripmenu')
@include('inc.messages')

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif


<div class="card mb-4">
    <div class="card-body">
        {!! Form::open([
            'method' => 'PUT' ,
            'action' => ['App\Http\Controllers\TripController@tripend',$trip->id ],
            'enctype' => 'multipart/form-data']) 
            !!}
             <div class="row">

                <div class="mb-3 col-md-6">
                  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Driver Name</label>

                  <input
                  class="form-control"
                  type="text"
                  value="{{ $trip->tripdriver->driver_name }}" 
                  id="drivername"
                  name="drivername"
                  readonly="readonly"
                />


                
                      @error('drivername')
                      <p class="alert-danger">
                        {{ $message }}
                      </p>
                      @enderror
                </div>
                <div class="mb-3 col-md-6">
                  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Fleet No</label>
                

                  <input
                  class="form-control"
                  type="text"
                  value="{{ $trip->tripfleet->fleetno }}" 
                  id="fleetno"
                  name="fleetno"
                  readonly="readonly"
                />
                  @error('fleetno')
                  <p class="alert-danger">
                    {{ $message }}
                  </p>
                  @enderror          
            </div>

            <div class="mb-3 col-md-6">
              <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Opening odo</label>
              
                <input
                  class="form-control"
                  type="text"
                  value="{{ $trip->openingkm }}" 
                  id="openingodo"
                  name="openingkm"
                  readonly="readonly"
                />
                               
        </div>

        <div class="mb-3 col-md-6">
          <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Closing odo</label>
          
            <input
              class="form-control"
              type="text"
              value="{{ $trip->closingkm }}" 
              id="closingodo"
              name="closingkm"
          
            />
                           
    </div>


    <div class="mb-3 col-md-6">
      <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Distance Travelled (Km)</label>
      
        <input
          class="form-control"
          type="text"
          value="{{ $trip->distance }}"
          id="distance"
          name="distance"
          
       
        />
                       
</div>
<div class="mb-3 col-md-6">
  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Actual Refuelling ()</label>
  
    <input
      class="form-control"
      type="text"
      value="{{ $trip->fuelbeforetrip }}"
      id="fuelbeforetrip"
      name="fuelbeforetrip"

    />
                   
</div>
<div class="mb-3 col-md-6">
  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Fuel Used /Dash</label>
  
    <input
      class="form-control"
      type="text"
      id="fuelused"
      name="fuelused"
      value="{{ $trip->fuelused }}"
   
    />
                   
</div>
<div class="mb-3 col-md-6">
  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Average Consumption/Dash</label>
  
    <input
      class="form-control"
      type="text"
      id="avgconsumption"
      name="avgconsumption"
      value="{{  $trip->avgconsumption }}"
    />
                  
</div>


<div class="mb-3 col-md-6">
  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Variance /fuel left</label>
  
    <input
      class="form-control"
      type="text"
      id="variance"
      name="variance"
      value="{{ $trip->fuelvarience }}"
  
    />
                   
</div>

<div class="mb-3 col-md-6">
  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Additional Fuel</label>
  
    <input
      class="form-control"
      type="text"
      id="addtionalfuel"
      name="addtionalfuel"
      value="{{ $trip->addtionalfuel }}"
  
    />
                   
</div>

<div class="mb-3 col-md-6">
  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Total In Tank</label>
  
    <input
      class="form-control"
      type="text"
      id="fuelintank"
      name="fuelintank"
      value="{{  $trip->fuelintank }}"
  
    />
                   
</div>

<div class="mb-3 col-md-6">
  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Shortage</label>
  
    <input
      class="form-control"
      type="text"
      id="shortage"
      name="shortage"
      value="{{ $trip->shortage }}"
  
    />
                   
</div>

<div class="mb-3 col-md-6">
  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Comment</label>
  
    <input
      class="form-control"
      type="text"
      id="comment"
      name="comment"
      value="{{  $trip->comment }}"
  
    />
                   
</div>





    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}

    
  
    
    <script>
      $("input").on("input", function() {
        var ret = parseInt($("#closingodo").val()) - parseInt($("#openingodo").val() || '0')
        $("#distance").val(ret);
      });


      $("input").on("input", function() {
        var ret = parseInt($("#fuelbeforetrip").val()) - parseInt($("#fuelused").val() || '0')
        $("#variance").val(ret);
      });

      $("input").on("input", function() {
        var ret = parseInt($("#variance").val()) + parseInt($("#addtionalfuel").val() || '0')
        $("#fuelintank").val(ret);
      })

      $("input").on("input", function() {
        var ret = parseInt($("#fuelintank").val()) - parseInt($("#fuelbeforetrip").val() || '0')
        $("#shortage").val(ret);
      })
       $("input").on("input", function() {
        var ret = parseInt($("#distance").val()) / parseInt($("#fuelused").val() || '0')
        $("#avgconsumption").val(ret.toFixed(2));
      })
    </script>
   
  

             </div>

             <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Close Trip</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection
