@extends('layouts.admin')

@section('content')
    <h1>Users</h1>

    <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
{{--                <th scope="col">Password</th>--}}
                <th scope="col">Created Date</th>
                <th scope="col">Updated Date</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @if(@users)
                @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>
                    {{$user->is_active == 1 ? 'Active' : 'Not Active'}}
                </td>
{{--                <td>{{$user->password}}</td>--}}
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
                    <a href="#" class="btn btn-success">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                </td>
              </tr>
                   @endforeach
                @endif
            </tbody>
     </table>

 @stop