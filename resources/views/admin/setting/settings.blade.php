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
            Settings
        </div>
        <div class="panel-body">
            <form action="{{route('settings.update', ['id'=> $settings->id])}}" method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" class="form-control" name="site_name" placeholder="Site Name"
                           value="{{$settings->site_name}}">
                </div>

                <div class="form-group">
                    <label for="contact_email" class="">Contact Email</label>
                    <input type="text" class="form-control" name="contact_email" placeholder="Contact Email"
                           value="{{$settings->contact_email}}">
                </div>

                <div class="form-group">
                    <label for="contact_number" class="">Contact Number</label>
                    <input type="text" class="form-control" name="contact_number" placeholder="Contact Number"
                           value="{{$settings->contact_number}}">
                </div>

                <div class="form-group">
                    <label for="address" class="">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address"
                           value="{{$settings->address}}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-default" type="submit">Update Setting</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('script')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

    <script>
        $(document).ready(function () {
            $('#content').summernote();
        });
    </script>
@stop

@section('style')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@stop

