@extends('layouts.app')


@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($category) ? 'Edit Category' : 'Create Category' }}
        </div>
        <div class="card-body">
            <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="{{isset($category) ? '' : 'Category Name ...'}}" value="{{isset($category) ? $category->name : ''}}" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" >{{ isset($category) ? 'Update Category' : 'Add Category' }}</button>
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
