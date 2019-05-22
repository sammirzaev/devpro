@extends('layouts.admin')

@section('content')
    <h1>Edit Post</h1>
    <div class="col-sm-3">
        <img width="150" src="{{$post->photo ? $post->photo->file : '/images/picture-not-available-clipart-12.jpg'}}" alt="" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-6">
        {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title: ') !!}
            {!! Form::text('title',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category: ') !!}
            {!! Form::select('category_id', $categories ? $categories : 'Uncategorized', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo: ') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Description: ') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-3 pull-left']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id], 'id'=>'postDelete']) !!}
        <td>
{{--    {!! Form::submit('Delete', ['class'=>'btn btn-danger', 'onclick'=>"btnDelete('postDelete')"]) !!}--}}
            <a href="#" class="btn btn-danger col-sm-3 pull-right" onclick="btnDelete('postDelete')">Delete</a>
        </td>
        {!! Form::close() !!}

    </div>

    @include('includes.form_error')
@stop

@include('includes.sweetalert')