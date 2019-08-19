@extends('layouts.admin')

@section('content')
 @if($photos)
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Created Date</th>
            <th scope="col">Updated Date</th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>
        @foreach($photos as $photo)
        <tr>
            <th scope="row">{{ $photo->id }}</th>
            <td><img width="50" src="{{ $photo->file ? $photo->file : '../images/picture-not-available-clipart-12.jpg' }}" alt=""></td>
            <td>{{ $photo->created_at->diffForHumans() }}</td>
            <td>{{ $photo->updated_at->diffForHumans() }}</td>
            <td>
                {!! Form::open(['method'=>'DELETE','action'=>['AdminPhotosController@destroy',$photo->id]]) !!}
                   {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
 @endif
@stop