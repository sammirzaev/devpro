@extends('layouts.admin')

@section('content')
    @if(Session::has('deleted_category'))
        <p class="alert alert-danger" role="alert">{{ session('deleted_category') }}</p>
    @endif

    <h1>Categories</h1>
<div class="col-sm-4">
    {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoryController@store', 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Category: ') !!}
        {!! Form::text('name',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Category', ['class'=>'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
</div>
    <div class="col-sm-6">
        <table class="table table-striped table-dark" id="datatable">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created Date</th>
                <th scope="col">Updated Date</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</td></td>
{{--                        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</td></td>--}}
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                        {!! Form::open(['method'=>'DELETE', 'id'=>'confirm_delete', 'action'=>['AdminCategoryController@destroy', $category->id]]) !!}
                        <td>
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
                        </td>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop


