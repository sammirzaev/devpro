@extends('layouts.admin')

@section('content')
    <h1>Edit Post</h1>

    <div class="col-sm-6">
        {!! Form::model($categories, ['method'=>'PATCH', 'action'=>['AdminCategoryController@update', $categories->id], 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Categiry : ') !!}
            {!! Form::text('name',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-3 pull-left']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoryController@destroy', $categories->id], 'id'=>'postDelete']) !!}
        <div class="form-group">
                {!! Form::submit('Delete', ['class'=>'btn btn-danger delete col-sm-3 pull-right']) !!}
        </div>
        {!! Form::close() !!}

    </div>

    @include('includes.form_error')
@stop

@include('includes.sweetalert')