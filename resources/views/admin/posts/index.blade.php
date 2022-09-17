@extends('layouts.admin')

@section('content')

<h1>Posts</h1>
<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Owner</th>
        <th>Category Id</th>
        
        <th>Title</th>
        <th>Comment</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        @if($posts)

        @foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td><img height="50" src="{{$post->photo ? asset($post->photo->file): 'https://via.placeholder.com/400
C/O https://placeholder.com/'}}" alt=""></td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category_id}}</td>
        
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
    
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      </tr>
      
      @endforeach
           
      @endif
    </tbody>
  </table>

@endsection