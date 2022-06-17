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
           
              <a class="nav-link" href="/consignments/"><i class="menu-icon tf-icons bx bxs-package"></i>Trucks</a>
            </li>
          
          
            
                
             
            <li class="nav-item">
              <a class="nav-link" href="/consignments/create">
                <i class='bx bx-highlight'></i> Add Truck
                </a>
            </li>
      
           
      
      
          </ul>
        </div>

        <form class="d-flex">
          <div class="input-group">
            <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
            <input type="text" class="form-control" placeholder="Search..." />
          </div>
        </form>
      </div>
    </div>
  </nav>
    
</div>