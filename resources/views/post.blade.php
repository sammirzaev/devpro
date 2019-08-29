@extends('layouts.blog-post')


@section('content')
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->toFormattedDateString()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : 'public/images/picture-not-available-clipart-12.jpg' }}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>
    <hr>
@if(Auth::check())
    <!-- Blog Comments -->
    @if (Session::has('comment_message'))
        <p class="alert alert-info text-center">{{session('comment_message')}}</p>
    @endif
    <!-- Comments Form -->
    <div class="well">

        <h4>Leave a Comment:</h4>
           {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
                 <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                    {!! Form::label('body', 'Comment: ') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                </div>
           {!! Form::close() !!}

    </div>
@endif
    <hr>
@if(count($comments) > 0)
    <!-- Posted Comments -->
  @foreach($comments as $comment)
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
{{--            <img class="media-object" src="{{$comment->photo ? $comment->photo : '/images/picture-not-available-clipart-12.jpg'}}" alt="" width="50">--}}
            <img class="media-object" src="{{Auth::user()->gravatar }}" alt="" width="50">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->toFormattedDateString()}}</small>
            </h4>
            {{$comment->body}}
                @if(count($comment->replies) > 0)
                    @foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                     <div class="comment-reply-container">
                         <!-- Nested Comment -->
                         <div class="media nested-media" style="margin-top: 30px; margin-bottom: 20px;">
                             <a class="pull-left" href="#">
                                 <img height="50" class="media-object" src="{{$reply->photo ? $reply->photo : '/images/picture-not-available-clipart-12.jpg'}}" alt="">
                             </a>
                             <div class="media-body">
                                 <h4 class="media-heading">{{$reply->author}}
                                     <small>{{$reply->created_at->diffForHumans()}}</small>
                                 </h4>
                                 {{$reply->body}}
                             </div>
                         </div>
                         <!-- End Nested Comment -->
                     </div>
                      @endif
                     @endforeach
                 @endif
                <div class="comment-reply-container">
                    <button class="toggle-reply btn btn-primary pull-right nested-media" style="margin-bottom: 20px;">Reply</button>
                    <div class="comment-reply col-md-10 row" style="display: none; margin-top: 30px;">
                        {{-- =============================REPLY FORM========================  --}}
                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <div class="form-group">
                            {!! Form::label('body', 'Reply: ') !!}
                            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                        {{-- ===========================END REPLY FORM========================  --}}
                    </div>
                </div>
        </div>
    </div>
    @endforeach
@endif
@stop
@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });
    </script>
@stop