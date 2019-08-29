@extends('layouts.admin')

@section('content')


   <h1>Posts</h1>
   @if(Session::has('deleted_post'))
      <p class="alert alert-danger" role="alert">{{ session('deleted_post') }}</p>
   @endif
   <table class="table table-striped table-dark" id="datatable">
      <thead>
      <tr>
         <th scope="col">ID</th>
         <th scope="col">Photo</th>
         <th scope="col">User</th>
         <th scope="col">Category</th>
         <th scope="col">Title</th>
         <th scope="col">Body</th>
         <th scope="col">Post Link</th>
         <th scope="col">Comment</th>
         <th scope="col">Created Date</th>
         <th scope="col">Updated Date</th>
         <th scope="col"></th>
      </tr>
      </thead>
      <tbody>


      @if($posts)
         @foreach($posts as $post)
            <tr>
               <th scope="row">{{$post->id}}</th>
               <td><img height="50" src="{{ $post->photo ? $post->photo->file : 'public/images/picture-not-available-clipart-12.jpg' }}" alt=""></td>
               <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
               <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
               <td>{{$post->title}}</td>
               <td>{{str_limit($post->body, 7)}}</td>
               <td><a target="_blank" href="{{route('home.post', $post->id)}}">View Post</a></td>
               <td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td>
               <td>{{$post->created_at->diffForHumans()}}</td>
               <td>{{$post->updated_at->diffForHumans()}}</td>
               {!! Form::open(['method'=>'DELETE', 'id'=>'confirm_delete', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
               <td>
                  <input type="hidden" name="id" value="{{$post->id}}">
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
               </td>
               {!! Form::close() !!}
            </tr>
         @endforeach
      @endif
      </tbody>
   </table>
    <div class="row">
       <div class="col-md-6 col-md-offset-5">
          {{ $posts->render() }}
       </div>
    </div>
@stop


