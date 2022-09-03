@extends( 'layouts.base')
@section('content')
@include('layouts.consignmentsmenu')
@include('inc.messages')



<div class="card mb-4">
    <div class="card-body">
        {!! Form::open([
            'method' => 'PUT' ,
            'action' => ['App\Http\Controllers\ConsignmentController@update',$consignment->id ],
            'enctype' => 'multipart/form-data']) 
            !!}

        <div class="row">

            <div class="mb-3 col-md-6">
                <label for="html5-number-input" class="col-md-6 col-form-label">Consignment No</label>
               
                  <input class="form-control" 
                  maxlength="10" 
                  type="number" 
                  min="1" 
                  name="consignmentno"
                  value="{{ $consignment->consignmentno }}" 
                  id="html5-number-input" 
             
                  />
                  @error('consignmentno')
                  <p class="alert-danger">
                    {{ $message }}
                  </p>
                  @enderror
            </div>

            <div class="mb-3 col-md-6">
              <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Date Of Dispatch </label>
              
                <input
                  class="form-control"
                  type="datetime-local"
                  value="{{ $consignment->dateofdispatch }}" 
                  id="html5-datetime-local-input"
                  name="dateofdispatch"
                />
                               
        </div>
            
          <div class="mb-3 col-md-6">
            <label for="defaultSelect" class="form-label">Driver</label>
            <select name="drivername" id="defaultSelect" class="form-select">

              <option value="{{ $consignment->driver->id }}"> {{ $consignment->driver->driver_name}} </option>
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
              <label for="defaultSelect" class="form-label">Fleet No</label>
              <select name="fleetno" id="defaultSelect" class="form-select">
              
                <option value="{{ $consignment->fleet->id }}">{{ $consignment->fleet->fleetno }}</option>
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
              <label for="exampleDataList" class="form-label">Contract</label>
              <input
                class="form-control"
                list="contractlistOptions"
                id="exampleDataList"
                placeholder="Type to search..."
                name="contract"
                value="{{ $consignment->contract }}" 
              />
              <datalist id="contractlistOptions">
                <option value="ZSS"></option>
                <option value="Zimplats"></option>
                <option value="Unki"></option>
                <option value="E-Trans"></option>
             
              </datalist>
              @error('contract')
              <p class="alert-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
  
       

            <div class="mb-3 col-md-6">
              <label for="exampleDataList" class="form-label">Loading point</label>
              <input
                class="form-control"
                list="loadingpointlistOptions"
                id="exampleDataList"
                placeholder="Type to search..."
                name="loadingpoint"
                value="{{ $consignment->loadingpoint }}" 
              />
              <datalist id="loadingpointlistOptions">
                <option value="South Africa"></option>
                <option value="Botswana"></option>              
             
              </datalist>
            </div>
  
            <div class="mb-3 col-md-6">
              <label for="exampleDataList" class="form-label">Off Loading point</label>
              <input
                class="form-control"
                list="offloadingpointlistOptions"
                id="exampleDataList"
                placeholder="Type to search..."
                name="offloadingpoint"
                value="{{ $consignment->offloadingpoint }}" 
              />
              <datalist id="offloadingpointlistOptions">
                <option value="Aspindale Harare"></option>
                <option value="Harare"></option>              
             
              </datalist>
            </div>
        

              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
              </div>

        </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection