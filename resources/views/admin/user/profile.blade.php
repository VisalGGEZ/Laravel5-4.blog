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
            Create a new post
        </div>
        <div class="panel-body">
            <div class="text-center">
                <img src="http://localhost:8000/{{$user->profile->avatar}}" alt="{{$user->name}}" width="100px" height="100px" class="img-circle">
                <h2>{{$user->name}}</h2>
            </div>
            <form action="{{route('user.profile.update', ['id' => $user->id])}}" method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group"><label for="name">User Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Username"
                           value="{{$user->name}}">

                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="abc123@gmail.com"
                           value="{{$user->email}}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="abc123@gmail.com"
                           value="{{$user->password}}">
                </div>

                <div class="form-group">
                    <label for="avatar" class="">Avatar</label>
                    <input type="file" class="form-control" name="avatar">
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" name="facebook" placeholder=""
                           value="{{$user->profile->facebook}}">
                </div>

                <div class="form-group">
                    <label for="youtube">Youtube</label>
                    <input type="text" class="form-control" name="youtube" placeholder=""
                           value="{{$user->profile->youtube}}">
                </div>

                <div class="form-group">
                    <label for="content">About Me</label>
                    <textarea name="about" id="about" cols="5" rows="5"
                              class="form-control">{{$user->profile->about}}</textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-default" type="submit">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

