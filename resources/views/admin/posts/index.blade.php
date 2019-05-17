@extends('layouts.admin')

@section('content')

   <h1>Posts</h1>

   <table class="table table-striped table-dark">
      <thead>
      <tr>
         <th scope="col">ID</th>
         <th scope="col">Photo</th>
         <th scope="col">User</th>
         <th scope="col">Category</th>
         <th scope="col">Title</th>
         <th scope="col">Body</th>
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
               <td>{{$post->user->name}}</td>
               <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
               <td>{{$post->title}}</td>
               <td>{{$post->body}}</td>
               <td>{{$post->created_at->diffForHumans()}}</td>
               <td>{{$post->updated_at->diffForHumans()}}</td>
               <td>
                  <button class="btn btn-danger">DELETE</button>
               </td>
            </tr>
         @endforeach
      @endif
      </tbody>
   </table>


@stop