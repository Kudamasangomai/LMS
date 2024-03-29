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
            'action' => ['App\Http\Controllers\TripController@update',$trip->id ],
            'enctype' => 'multipart/form-data']) 
            !!}
             <div class="row">

                <div class="mb-3 col-md-6">
                    <label for="html5-number-input" class="col-md-6 col-form-label">Driver Name</label>
                    <select name="drivername" id="defaultSelect" class="form-select">
                    @foreach($drivers as $drivers)
                    <option value="{{ $drivers->id }}">{{ $drivers->driver_name }}</option>
                @endforeach
                  </select>
                
                      @error('consignmentno')
                      <p class="alert-danger">
                        {{ $message }}
                      </p>
                      @enderror
                </div>
                <div class="mb-3 col-md-6">
                  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Fleet No</label>
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
              <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Opening odo</label>
              
                <input
                  class="form-control"
                  type="text"
                  value="{{ $trip->openingkm }}" 
                  id="openingodo"
                  name="openingkm"
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




{{-- <div class="mb-3 col-md-6">
  <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Variance /fuel left</label>
  
    <input
      class="form-control"
      type="text"
      id="variance"
      name="variance"
      value="{{ $trip->fuelvarience }}"
  
    />
                   
</div> --}}












    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    {{-- <div class="field">
      <label for="field1">F1:</label>
      <input type="number" id="field1" min="0" placeholder="0" Title="Only positive numbers" required/>
    </div>
    <div class="field">
      <label for="field2">Field2:</label>
      <input type="number" id="field2"/>
    </div> --}}
    
  
    
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

      // $("input").on("input", function() {
      //   var ret = parseInt($("#fuelintank").val()) - parseInt($("#fuelbeforetrip").val() || '0')
      //   $("#shortage").val(ret);
      // })
      
    </script>
   
  

             </div>

             <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Update</button>
              <button type="reset" class="btn btn-outline-secondary"><a href="/trip/">Cancel</a> </button>
            </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection
