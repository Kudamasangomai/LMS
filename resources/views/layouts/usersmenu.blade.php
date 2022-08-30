<div class="container-xxl flex-grow-1 container-p-y">
    @if($title)
    <h4 class="fw-bold py-3 mb-2">
      <span class="text-muted fw-light">{{ $title }} </span> 
    </h4>
    @endif
  
  

       
 
      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
       
          <a class="nav-link active" href="/users/"><i class="menu-icon tf-icons bx bxs-Users"></i> Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/users/create">
            <i class='bx bx-highlight'></i> Add User
            </a>
        </li>
     
      </ul>
    
    <form class="d-flex">
      <div class="input-group">
        <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
        <input type="text" class="form-control" placeholder="Search..." />
      </div>
    </form>

     