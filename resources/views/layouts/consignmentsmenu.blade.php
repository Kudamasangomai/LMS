<div class="container-xxl flex-grow-1 container-p-y">
  @if($title)
  <h4 class="fw-bold py-3">
    <span class="text-muted fw-light">{{ $title }} </span> 
  </h4>
  @endif


<div class="col-md-12">
  <nav class="navbar navbar-example navbar-expand-lg bg-dark">
    <div class="container-fluid">
     

      <div class="collapse navbar-collapse" id="navbar-ex-4">
        <div class="navbar-nav me-auto">
          <ul class="nav nav-pills flex-column flex-md-row mb-3">
     
            <li class="nav-item">
           
              <a class="nav-link" href="/consignments/"><i class="menu-icon tf-icons bx bxs-package"></i> Consignments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/consignments/closedConsigments">
                <i class='bx bx-highlight'></i> Closed Consigment
                </a>
            </li>
          
              @if (Auth::user()->roles  >= 5)
                
             
            <li class="nav-item">
              <a class="nav-link" href="/consignments/create">
                <i class='bx bx-highlight'></i> Create Consignment
                </a>
            </li>
      
            @endif
      
      
          </ul>
        </div>
        {!! Form::open([
          'class'=>'form-inline',
          'method' => 'GET' ,
          'action' => 'App\Http\Controllers\ConsignmentController@search' ,
          'enctype' => 'multipart/form-data'])
        !!}
     
          <div class="input-group">
            <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
            <input type="text" name="search" class="form-control" placeholder="Search..." />
          </div>
          {!! Form::close() !!}
      </div>
    </div>
  </nav>
    
</div>