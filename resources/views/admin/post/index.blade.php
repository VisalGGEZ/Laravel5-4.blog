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
                    <th class="col-lg-2 col-sm-2">Image</th>
                    <th class="col-lg-9 col-sm-9">Title</th>
                    <th class="col-lg-1 col-sm-1"></th>
                    <th class="col-lg-1 col-sm-1"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="http://localhost:8000/{{$post->featured}}" alt="{{$post->title}}" width=100px" height="60px">
                        </td>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger">x</a>
                        </td>

                        <td>
                            <a href="#" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

