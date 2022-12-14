@extends('layouts.admin')

@section('content')

@if(count($comments)>0)

<h1>Comments</h1>

<table class="table table-hover">
 
    <thead>
      <tr>
        <th>ID</th>
        <th>User</th>
        <th>Email</th>
        <th>Body</th>
        <th>View Post</th>
        <th>Action</th>
        <th>Delete</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        @foreach($comments as $comment )
     <tr>
      <td>{{$comment->id}}</td>
      <td>{{$comment->author}}</td>
      <td>{{$comment->email}}</td>
      <td>{{$comment->body}}</td>
      <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
       <td>
    @if($comment->is_active==1)
       
       {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id,'files'=>'true']])!!}

      <input type="hidden" name="is_active" value="0" >

       <div class="form-group">
         {!! Form::submit('Un-approve',['class'=>'btn btn-info']) !!}
      </div>

         {!! Form::close() !!}

      @else
       
    {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id,'files'=>'true']])!!}

     <input type="hidden" name="is_active" value="1" >

     <div class="form-group">
      {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
     </div>

    {!! Form::close() !!}


@endif
       </td>

       <td>
       {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy',$comment->id,'files'=>'true']])!!}

<div class="form-group">
 {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
</div>

{!! Form::close() !!}

       </td>



      <td>{{$comment->create_at ? $comment->create_at->diffForHumans() : 'No date'}}</td>
      <td>{{$comment->updated_at ? $comment->updated_at->diffForHumans() : 'No date'}}</td>
     </tr>
    
      @endforeach
    </tbody>

</table>
@else
<h1 class="text-center"> No Comments</h1>


@endif



@endsection()