@extends('layouts.admin')



@section('content')
    <h1>Upload Media</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminPhotosController@store', 'class'=>'dropzone', 'files'=>true]) !!}


    {!! Form::close() !!}

@stop

