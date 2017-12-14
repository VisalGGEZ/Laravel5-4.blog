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
            Update a category
        </div>
        <div class="panel-body">

            <form action="{{route('category.update', ['id'=> $category->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Name">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-default" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

