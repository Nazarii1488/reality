@if(session()->has('success'))
    <div class="container">
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    </div>
@endif
@if(session()->has('danger'))
    <div class="container">

        <div class="alert alert-danger">
            {{session()->get('danger')}}
        </div>
    </div>
@endif
@if(session()->has('warning'))
    <div class="container">

        <div class="alert alert-warning">
            {{session()->get('warning')}}
        </div>
    </div>
@endif

