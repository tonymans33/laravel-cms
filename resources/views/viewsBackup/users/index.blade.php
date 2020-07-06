@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
           Users
        </div>
        <div class="card-body">
            @if(count($users) > 0)
                <table class="table">
                    <thead>
                    <th>
                        Image
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img class="user-image" src="{{Gravatar::src($user->email)}}}">
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                @if(!$user->isAdmin())
                                    <form action="{{route('users.make-admin', $user->id)}} " method="POST">
                                        @csrf
                                        <button type="submit" style="margin-bottom: 0" class="btn btn-success btn-sm">Make Admin <i style="color: #ffffff" class="fa fa-user fa-sm"></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    @else
                        <div class="text-center">No Users Yet!</div>
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


                #TrashButton i{
                    color: #e3342f;
                }
                #TrashButton i:hover{
                    color: #C1312D;
                }
                i:hover{
                    color: #3490dc;
                }

                .user-image{
                    width: 40%;
                    max-width: 400px;
                    max-height: 300px;
                    border-radius: 50%;
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
