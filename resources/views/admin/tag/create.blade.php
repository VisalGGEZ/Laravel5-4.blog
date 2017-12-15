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
            Create a new Tag
        </div>
        <div class="panel-body">
            <form action="{{route('tag.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="tag">Tag Name</label>
                    <input type="text" class="form-control" name="tag" placeholder="tag">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-default" type="submit">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

