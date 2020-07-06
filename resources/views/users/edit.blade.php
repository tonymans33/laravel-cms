@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">My Profile</div>

    <div class="card-body">
        <form action="{{route('users.update-profile')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="about">About Me</label>
                <textarea type="text" name="about" id="about" class="form-control" >{{$user->about}}</textarea>
            </div>
            <button type="submit" class="btn btn-success ">Update</button>

        </form>
    </div>
</div>


@endsection

<style>
    @media screen and (max-width: 600px){
        .card{
            margin-top: 2rem;
        }
    }
</style>

