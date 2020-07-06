@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2 mt-2" style=" color: #ffffff">
        <a href="{{route('categories.create')}}" class="btn btn-success" >Add Categories</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Categories
        </div>

        <div class="card-body">
            @if(count($categories) > 0)

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
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->id}}
                            </td>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                {{$category->post->count()}}
                            </td>
                            <td>
                                <a href="{{route('categories.edit', $category->id)}}" ><i  class="fa fa-edit fa-sm"></i></a> |
                                <button id="deleteButton" onclick="handleDelete({{$category->id}})"><i class="fa fa-trash fa-sm"></i></button>
                            </td>
                        </tr>
                    @endforeach

                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route('categories.destroy', $category->id)}}" method="POST" id="deleteCategoryForm">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center text-bold"> Are you sure you want to delete this category ?</div>
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
                    <div class="text-center">No Categories Yet !</div>
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
        .fa-trash:hover{
            color: #e3342f;
        }
        .fa-edit:hover{
            color: #3490dc;
        }
    </style>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {

            var form = document.getElementById('deleteCategoryForm')

            //form.action = '/categories/'+id

            $('#deleteModal').modal('show')

        }
    </script>

@endsection
