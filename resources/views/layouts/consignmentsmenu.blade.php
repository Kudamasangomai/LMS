<div class="container-xxl flex-grow-1 container-p-y">
  @if($title)
  <h4 class="fw-bold py-3">
    <span class="text-muted fw-light">{{ $title }} </span> 
  </h4>
  @endif



  

          <ul class="nav nav-pills flex-column flex-md-row mb-3">
     
            <li class="nav-item">
           
              <a class="nav-link active" href="/consignments/"><i class="menu-icon tf-icons bx bxs-package"></i> Consignments</a>
              
            </li>
            @if(Auth::user()->roles < 4 )

            @else
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
            @endif
      
      
          </ul>

          
       
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
          <br>
    
  
