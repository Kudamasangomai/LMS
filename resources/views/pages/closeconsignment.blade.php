@extends( 'layouts.base')
@section('content')
@include('layouts.consignmentsmenu')
@include('inc.messages')



<div class="card mb-4">
    <div class="card-body">
        {!! Form::open([
            'method' => 'PUT' ,
            'action' => ['App\Http\Controllers\ConsignmentController@closecon',$consignment->id ],
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
                  readonly="readonly"
                  />
                  @error('consignmentno')
                  <p class="alert-danger">
                    {{ $message }}
                  </p>
                  @enderror
            </div>

       

            <div class="mb-3 col-md-6">
                <label for="exampleDataList" class="form-label">Submitted</label>
                <input
                  class="form-control"
                  list="offloadingpointlistOptions"
                  id="exampleDataList"
                  placeholder="Type to search..."
                  name="submitted"
                />
                <datalist id="offloadingpointlistOptions">
                  <option value="Submitted"></option>
                  <option value="Cancelled"></option>              
               
                </datalist>
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