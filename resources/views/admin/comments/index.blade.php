@extends('layouts.admin')

@section('content')

        <h1>Comments</h1>
 @include('includes.search')
  @if(count($comments) > 0)
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Comment</th>
                <th scope="col">Post</th>
                <th scope="col">Approve</th>
                <th scope="col">Created Date</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
            <tr>
                <th scope="row">{{$comment->id}}</th>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->body}}</td>
                <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
                <td><a href="{{route('replies.show', $comment->id)}}">View Replies</a></td>
                <td>
                    @if($comment->is_active == 1)
                        {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-Approve', ['class'=>'btn btn-info']) !!}
                            </div>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                            </div>
                        {!! Form::close() !!}
                    @endif
                </td>
                <td>{{$comment->created_at->diffForHumans()}}</td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>

            </tr>

             @endforeach
            </tbody>

        </table>
        @else

          <h1 class="text-center">NO COMMENTS FOUND</h1>


    @endif
@stop