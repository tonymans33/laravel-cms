@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
        </div>
        <div class="card-body">
            <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
                @csrf
                @if(isset($tag))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="{{isset($tag) ? '' : 'Tag Name ...'}}" value="{{isset($tag) ? $tag->name : ''}}" >
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success" >{{ isset($tag) ? 'Update Tag' : 'Add Tag' }}</button>
                </div>

            </form>

        </div>

    </div>
@endsection

@section('styles')
    <style>
        @media screen and (max-width: 600px){
            .card-default {
                margin-top: 2rem;
            }
        }

        button{
            margin-left: 50%;
            transform: translateX(-50%);
        }
    </style>
@endsection
