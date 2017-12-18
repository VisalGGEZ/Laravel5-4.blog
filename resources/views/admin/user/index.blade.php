@extends('layouts.app')

@section('content')

    @if(count($errors) > 0)

        <ul class="list-group">

            @foreach($errors->all() as $error)

                <li class="list-group-item panel-danger text-danger">
                    {{$error}}
                </li>

            @endforeach

        </ul>

    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Posts List</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-lg-2 col-sm-1">Avatar</th>
                    <th class="col-lg-9 col-sm-9">User Name</th>
                    <th class="col-lg-1 col-sm-1">Admin</th>
                    <th class="col-lg-1 col-sm-1"></th>
                </tr>
                </thead>
                <tbody>
                @if($users->count() > 0)
                    @foreach($users as $user)
                        <tr class=>
                            <td>
                                <img src="http://localhost:8000/{{$user->profile->avatar}}" alt="{{$user->name}}"
                                     width=50"
                                     height="50px">
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                @if($user->admin == 1)
                                    <a href="{{route('user.down', ['id'=>$user->id])}}" class="btn btn-default">Downgrade</a>
                                @else
                                    <a href="{{route('user.up', ['id'=>$user->id])}}"
                                       class="btn btn-default">Upgrade</a>
                                @endif
                            </td>

                            <td>
                                @if(Auth::id() !== $user->id)
                                    <a href="{{route('user.delete', ['id'=>$user->id])}}"
                                       class="btn btn-default">Delete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">
                            <h3>No User record(s).</h3>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

