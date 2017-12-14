@extends('layouts.app')

@section('content')

    @if(count($errors) > 0)

        <ul class="list-group">

            @foreach($errors->all() as $error)

                <li class="list-group-item panel-danger text-danger">
                {{$error}}

            @endforeach

        </ul>

    @endif

    <div class="panel panel-default">
        <div class="panel-heading">                </li>
            Categories
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-lg-10 col-sm-10 col-xs-10">Name</th>
                    <th class="col-lg-1 col-sm-1 col-xs-1"></th>
                    <th class="col-lg-1 col-sm-1 col-xs-1"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $cat)

                    <tr>
                        <td>{{$cat->name}}</td>
                        <td>
                            <a href="{{route('category.delete', ['id' => $cat->id])}}"
                               class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <a href="{{route('category.edit', ['id' => $cat->id])}}"
                               class="btn btn-success">Update</a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop

