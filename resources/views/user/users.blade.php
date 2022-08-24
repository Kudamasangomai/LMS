@extends('layouts.base')

@section('content')



    @include('layouts.usersmenu')
    @include('inc.messages')

    <div class="card mb-4">
   
   
       
   
    

    </div>
   
      <div class="card" >
        <h5 class="card-header">list of Users</h5>
        {{-- <div class="table-responsive text-nowrap"> --}}
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>email</th>
                <th>Role</th>
             
                <th>Created @</th>
                <th> Updated @</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($users) > 0)
                @foreach($users as $user)
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3">
                    </i> <strong>{{ $user->id }} </strong>
                </td>
                <td>
                    {{ $user->name }} 
               
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                {{ $user->roles }}
                </td>
                <td>
                    {{$user->created_at}}
                    </td>
                   
                        <td>
                            {{ $user->updated_at}}
                
                            </td>
            
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">

                      <a class="dropdown-item" href="/users/{{$user->id}}"
                        ><i class="bx bx-edit-alt me-1"></i> View</a
                      >
                       
                      <a class="dropdown-item" href="/users/{{$user->id}}/edit"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                     
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
         
              @endforeach
              
            
            </tbody>
            
          </table>
       
         
        {{-- </div> --}}
        <br/>  

        @else
      
        <p>No users found</p>
        @endif


      </div>

@endsection