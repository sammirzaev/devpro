@extends('layouts.admin')

@section('content')
    <h1>Create Category</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoryController@store', 'class'=>'col-md-3', 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Category: ') !!}
        {!! Form::text('name',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Category', ['class'=>'btn btn-success']) !!}
    </div>


    {!! Form::close() !!}
    @include('includes.form_error')
@stop