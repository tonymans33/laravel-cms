@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2 mt-2" style=" color: #ffffff">
        <a href="{{route('tags.create')}}" class="btn btn-success" >Add Tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Tags
        </div>

        <div class="card-body">
            @if(count($tags) > 0)

                <table class="table">
                    <thead>
                    <th>
                        Id
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Posts Number
                    </th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->id}}
                            </td>
                            <td>
                                {{$tag->name}}
                            </td>
                            <td>
                                {{$tag->post->count()}}
                            </td>
                            <td>
                                <a href="{{route('tags.edit', $tag->id)}}" ><i  class="fa fa-edit fa-sm"></i></a> |
                                <button id="deleteButton" onclick="handleDelete({{$tag->id}})"><i class="fa fa-trash fa-sm"></i></button>
                            </td>
                        </tr>
                    @endforeach

                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route('tags.destroy', $tag->id)}}" method="POST" id="deleteCategoryForm">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Tags</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center text-bold"> Are you sure you want to delete this Tag ?</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @else
                        <div class="text-center">No Tags Yet !</div>
                    @endif
                    </tbody>

                </table>
        </div>
    </div>


@endsection

@section('styles')
    <style>
        i{
            color: #252525;
            transition: color .4s ease-out;
        }

        #deleteButton{
            background: none!important;
            border: none;
            padding: 0!important;
            outline: none;
        }
        i:hover{
            color: #3490dc;
        }
    </style>
@endsection

@section('scripts')
    <script>
        function handleDelete() {

            $('#deleteModal').modal('show')

        }
    </script>

@endsection
