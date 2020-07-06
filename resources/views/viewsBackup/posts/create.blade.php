@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{isset($post) ? 'Edit Post' : 'Create Post'}}
        </div>
        <div class="card-body">
            <form action="{{isset($post) ? route('posts.update', $post->id) :route('posts.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{isset($post) ? $post->title : ''}}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="description" placeholder="Description" value="{{isset($post) ? $post->description : ''}}">
                </div>

                <div class="form-group">
                   <textarea class="form-control" name="body" rows="5" cols="5" placeholder="Content">{{isset($post) ? $post->body : ''}}</textarea>
                </div>

                <div class="form-group">
                    <input type="datetime-local" class="form-control" name="published_at" id="published_at" placeholder="Published At" value="">
                </div>

                @if(isset($post))
                    <div class="form-group" id="image-div">
                        <img class="post-image" src="../../../public/storage/{{$post->image}}" alt="{{$post->image}}" >
                    </div>
                @endif

                <div class="form-group" id="image-div">
                    <input style="padding-bottom: 2.2rem" type="file" class="form-control" name="image" id="image" >
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" id="category" class="form-control">
                        @if(count($categories) > 0))
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if(isset($post))
                                            @if($category->id === $post->category_id)
                                                selected
                                            @endif
                                        @endif>
                                    {{$category->name}}
                                </option>
                            @endforeach
                        @else
                            <option value="">There Are No Categories</option>
                        @endif
                    </select>
                </div>

                @if(count($tags) > 0)
                <div class="form-group">
                    <label for="tag">Tags:</label>
                    <select name="tags[]" id="tags" class="form-control tags-selector" multiple>

                        @foreach($tags as $tag)
                            <option style="height: 1rem" value="{{$tag->id}}"
                            @if(isset($post))
                                @if($post->hasTag($tag->id))
                                    selected
                                @endif
                            @endif
                            >
                                {{$tag->name}}
                            </option>
                        @endforeach

                    </select>
                </div>
                @endif

                <div class="form-group">
                    <button type="submit" class="btn btn-success" >{{ isset($post) ? 'Update Post' : 'Add Post' }}</button>
                </div>

            </form>

        </div>

    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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

    .post-image{
        width: 80%;
        max-width: 400px;
        max-height: 300px;
        margin-left: 50%;
        transform: translateX(-50%);
    }


</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.tags-selector').select2();

    });
</script>

@endsection
