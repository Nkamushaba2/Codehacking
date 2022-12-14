@extends('layouts.admin')

@section('content')

<h1>Edit Post</h1>
<!-- Displaying errors  -->
<div class="col-sm-12">
@include('includes.form_errors')
</div>
<div class="row">
    <div class="col-sm-3">
        <img height="100" src="{{$post->photo->file}}" alt="" class="image-responsive">
    </div>
<div class="col-sm-9">
    
{!! Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update',$post->id],'files'=>'true'])!!}

<div class="form-group">
 {!! Form::label('title','Title') !!}
 {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
 {!! Form::label('category_id','Category') !!}
 {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
 {!! Form::label('photo_id','Photo') !!}
 {!! Form::file('photo_id',['class'=>'form-control']) !!}
</div>

<div class="form-group">
 {!! Form::label('body','Description') !!}
 {!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Edit Post',['class'=>'btn btn-primary col-sm-6']) !!}
</div>

{!! Form::close() !!}


{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy',$post->id]])!!}
<div class="form-group">
    {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-6']) !!}
</div>


{!! Form::close() !!}
<!-- End div form -->
</div>
<!-- End col-sm-12 div -->
</div>


@endsection