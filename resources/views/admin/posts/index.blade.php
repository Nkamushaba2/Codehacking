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
        <th>Body</th>
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

        <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
        <td>{{$post->category ? $post->category->name :'uncategrized'}}</td>
        
        <td>{{$post->title}}</td>
        <td>{{Str::limit($post->body,20)}}</td>
    
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      </tr>
      
      @endforeach
           
      @endif
    </tbody>
  </table>

@endsection