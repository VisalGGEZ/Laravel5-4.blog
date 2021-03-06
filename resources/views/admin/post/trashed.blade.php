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

            @if($posts->count() != 0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="col-lg-2 col-sm-2">Image</th>
                        <th class="col-lg-9 col-sm-8">Title</th>
                        <th class="col-lg-1 col-sm-1"></th>
                        <th class="col-lg-1 col-sm-1"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <img src="http://localhost:8000/{{$post->featured}}" alt="{{$post->title}}" width=100px"
                                     height="60px">
                            </td>
                            <td>
                                {{$post->title}}
                            </td>
                            <td>

                                <a href="{{route('post.restore', ['id' => $post->id])}}"
                                   class="btn btn-default">Restore</a>
                            </td>
                            <td>

                                <a href="{{route('post.destroy', ['id' => $post->id])}}"
                                   class="btn btn-default">Destroy</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

            @if($posts->count() == 0)
                <h2 class="text-center text-info">There is no even a record in trashed.</h2>
            @endif


        </div>
    </div>
@stop

