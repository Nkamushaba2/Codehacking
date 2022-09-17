@extends('layouts.admin')

@section('content')
       @if(Session::has('user-delete'))
      <p class="bg-danger"> {{Session('user-delete')}} </p>

         @endif
<h1>Users</h1>
<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        @if($users)

        @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><img height="50" src="{{$user->photo ? $user->photo->file :'https://via.placeholder.com/400

C/O https://placeholder.com/'}}" alt=""></td>
        <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>
             {{$user->role->name}}
            </td>
        <td>{{$user->is_active==1 ? 'Active' : 'Not Active'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      
      @endforeach
           
      @endif
    </tbody>
  </table>
@stop