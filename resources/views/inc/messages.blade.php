
@if(session('success'))
<div
    x-data="{show: true}" 
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif


@if(session('fleeterror'))
    <div class="alert alert-warning" role="alert">
        {{session('fleeterror')}}
    </div>
@endif