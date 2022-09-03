@extends('layouts.base')
@section('content')
@include('layouts.consignmentsmenu')
@include('inc.messages')






       

<div class="card">
    <h5 class="card-header">Confirmation</h5>
    <div class="card-body">
      <div class="mb-3 col-12 mb-0">
        <div class="alert alert-primary">
          <h6 class="alert-heading fw-bold mb-1">Confirm You Are Recieving The consignment no {{ $consignment->consignmentno }}?</h6>
          <p class="mb-0">Once you Have Confirmed , there is no going back. Please be certain.</p>
        </div>
      </div>
      {!! Form::open([
        'method' => 'PUT' ,
        'action' => ['App\Http\Controllers\ConsignmentController@accrecievedconsignment',$consignment->id ],
        'enctype' => 'multipart/form-data']) 
        !!}
        <div class="form-check mb-3">
       
       
        </div>
        <button type="submit" class="btn btn-success ">Confirm</button>
        <button type="submit" class="btn btn-warning">Cancel</button>
      </form>
     {!! Form::close() !!}
    </div>
  </div>

@endsection