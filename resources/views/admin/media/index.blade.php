@extends('layouts.admin')

@section('content')
<h1>Media Photos </h1>
@if(Session::Has('message'))
<p class="bg-danger">{{Session('message')}}</p>
@endif

@if($photos)
<table class="table table-hover">
 
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
     
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        @foreach($photos as $photo)
      <tr>

     <td> {{$photo->id}}   </td>
     <td><img height="100"src="{{$photo->file ? $photo->file :'No photo'}} " alt=""></td>
     <td> {{$photo->created_at ? $photo->created_at->diffForHumans() : 'No date'}}  </td>
     <td> {{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'No date'}}  </td>
  <td>

{!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy',$photo->id]])!!}

<div class="form-group">
    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
</div>

{!! Form::close() !!}
</td>

     </tr>
     @endforeach

    </tbody>

</table>
@endif



@endsection 