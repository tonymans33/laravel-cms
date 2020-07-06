@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2 mt-2" style=" color: #ffffff">
        <a href="{{route('posts.create')}}" class="btn btn-success" >Add Post</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
            @if(count($posts) > 0)
            <table class="table">
                <thead>
                <th>
                    Image
                </th>
                <th>
                    Title
                </th>
                <th>
                    Category
                </th>
                <th>Action</th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <img class="post-image" src="../public/storage/{{$post->image}}" alt="{{$post->image}}" >
                            </td>
                            <td>
                                {{$post->title}}
                            </td>
                            <td>
                                {{$post->category->name}}
                            </td>
                            <td class="actions">
                                @if($post->trashed())
                                    <form action="{{route('restore-posts', $post->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" ><i  class="fa fa-trash-restore fa-sm"></i></button>

                                    </form>
                                @else
                                    <a href="{{route('posts.edit', $post->id)}}" ><i  class="fa fa-edit fa-sm"></i></a>
                                @endif

                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="{{$post->trashed() ? 'TrashButton' : 'DeleteButton'}}"><i class="fa fa-trash fa-sm" ></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                @else
                    <div class="text-center">No Posts Yet!</div>
                @endif

                </tbody>

            </table>
    </div>
@endsection

@section('styles')
    <style>
        i{
            color: #252525;
            transition: all .4s ease-out;
            padding: 0 .3rem;
        }

        button{
            background: none!important;
            border: none;
            padding: 0!important;
            outline: none;
        }

        #TrashButton i{
            color: #e3342f;
        }
        #TrashButton i:hover{
            color: #C1312D;
        }
        i:hover{
            color: #3490dc;
        }

        .post-image{
            width: 50%;
            max-width: 400px;
            max-height: 300px;
        }
        .actions{
            display: flex;
            margin: 0 .2rem;
        }

        .fa-trash-restore {
            color: #3490dc;
        }
        .fa-trash-restore:hover{
            color: #307DBF;
        }
    </style>
@endsection

@section('scripts')
    <script>

    </script>

@endsection
