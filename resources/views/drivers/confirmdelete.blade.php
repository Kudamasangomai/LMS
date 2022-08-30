@extends( 'layouts.base')
@section('content')
@include('layouts.drivermenu')

<div class="row">
    <div class="col-md-12">   
        

        {!! Form::open([ 'method' => 'PUT' ,
            'action' => ['App\Http\Controllers\DriverController@destroy',$driver->id ],
            'enctype' => 'multipart/form-data']) 
        !!}
        {{Form::hidden('_method', 'DELETE')}}
     
    <fieldset class="form-group">
     <div class="col-xs-6">
        <h4>You are Deleting {{ $driver->driver_name }} Account  </h4>
    
        <h3>Are You Sure</h3>
           <div class="form-group">
      <button type="submit" class="btn btn-danger">Yes Delete</button>
       <a href="/drivers/" class="btn btn-warning">No Cancel</a>
           </div>
           </fieldset>
        
     </div>
        
     {!! Form::close() !!}
    </div>
</div>
@endsection

