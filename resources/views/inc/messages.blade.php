<!--error messages counter-->
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" style="margin-top: 2% ; text-align: center;">
            {{$error}}
        </div>
    @endforeach
@endif

<!--success messages-->
@if(session('success'))
    <div class="alert alert-success" style="margin-top: 2% ; text-align: center;">
        {{session('success')}}
    </div>
@endif

<!--warning messages-->
@if(session('warning'))
    <div class="alert alert-warning" style="margin: 2% 0 ; text-align: center;">
        {{session('warning')}}
    </div>
@endif

<!--error messages-->
@if(session('error'))
    <div class="alert alert-danger" style="margin-top: 2%; text-align: center;">
        {{session('error')}}
    </div>
@endif
