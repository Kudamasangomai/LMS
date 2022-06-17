@extends('layouts.base')
@section('content')
@include('layouts.consignmentsmenu')
 
 
    <div class="card mb-4">
    <div class="card-body">
    
       
          {!! Form::open([
          'method' => 'POST' ,
          'action' => 'App\Http\Controllers\ConsignmentController@store' ,
          'enctype' => 'multipart/form-data']) 
          !!}
          <div class="row">

            <div class="mb-3 col-md-6">
                <label for="html5-number-input" class="col-md-6 col-form-label">Consignment No</label>
               
                  <input class="form-control" 
                  maxlength="10" 
                  type="text" 
                  min="1" 
                  name="consignmentno"
                  value="{{ old('consignmentno') }}" 
                  id="html5-number-input" 
                  placeholder="45105"
                  />
                  @error('consignmentno')
                  <p class="alert-danger">
                    {{ $message }}
                  </p>
                  @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="html5-datetime-local-input" class="col-md-6 col-form-label">Date Of Dispatch</label>
                
                  <input
                    class="form-control"
                    type="datetime-local"
                    value="{{ old('dateofdispatch') }}"
                    id="html5-datetime-local-input"
                    name="dateofdispatch"
                  />
                  @error('dateofdispatch')
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
            <label for="exampleDataList" class="form-label">Contract</label>
            <input
              class="form-control"
              list="contractlistOptions"
              id="exampleDataList"
              placeholder="Type to search..."
              name="contract"
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
            />
            <datalist id="loadingpointlistOptions">
              <option value="South Africa"></option>
              <option value="Botswana"></option>              
           
            </datalist>
            @error('loadingpoint')
            <p class="alert-danger">
              {{ $message }}
            </p>
            @enderror
          </div>

          <div class="mb-3 col-md-6">
            <label for="exampleDataList" class="form-label">Off Loading point</label>
            <input
              class="form-control"
              list="offloadingpointlistOptions"
              id="exampleDataList"
              placeholder="Type to search..."
              name="offloadingpoint"
            />
            <datalist id="offloadingpointlistOptions">
              <option value="Aspindale Harare"></option>
              <option value="Harare"></option>              
           
            </datalist>
            @error('offloadingpoint')
            <p class="alert-danger">
              {{ $message }}
            </p>
            @enderror
          </div>

          <div class="mb-3 col-md-6">
            <label for="firstName" class="form-label">Comment</label>
            <input
              class="form-control"
              type="text"
              id="firstName"
              name="comment"
             placeholder="comment"
              autofocus
            />
            @error('comment')
            <p class="alert-danger">
              {{ $message }}
            </p>
            @enderror
          </div>


          
           
           

          

          
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
          </div>
        	{!! Form::close() !!}
      </div>
    </div>

</div>




        




@endsection