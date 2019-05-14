@extends('layouts.admin')

@section('content')
     @if(Session::has('deleted_user'))
       <p class="alert alert-danger" role="alert">{{ session('deleted_user') }}</p>
     @endif

    <h1>Users</h1>

    <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Photo</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Password</th>
                <th scope="col">Created Date</th>
                <th scope="col">Updated Date</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @if($users)
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <th><img  height="50" src="{{$user->photo ? $user->photo->file : '/images/picture-not-available-clipart-12.jpg'}}" alt=""></th>
                        <td><a href="{{ route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>
                            {{$user->is_active == 1 ? 'Active' : 'Not Active'}}
                        </td>
                        <td>{{$user->password}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
                        <td>
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </td>
                        {!! Form::close() !!}
                      </tr>
                   @endforeach
                @endif
            </tbody>
     </table>

 @stop