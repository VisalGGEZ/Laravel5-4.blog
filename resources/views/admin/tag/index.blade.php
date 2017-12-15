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
            Tags
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

                @foreach($tags as $tag)

                    <tr>
                        <td>{{$tag->tag}}</td>
                        <td>
                            <a href="{{route('tag.delete', ['id' => $tag->id])}}"
                               class="btn btn-default">Delete</a>
                        </td>
                        <td>
                            <a href="{{route('tag.edit', ['id' => $tag->id])}}"
                               class="btn btn-default">Update</a>
                        </td>
                    </tr>

                @endforeach

                <tr>
                    <td colspan="3">@if($tags->count() == 0)
                            <h3 class="text-center text-info">There is no any tag in list</h3>
                        @endif</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@stop

