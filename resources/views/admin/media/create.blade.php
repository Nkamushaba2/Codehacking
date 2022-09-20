@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
<h1>Create Media Photos </h1>


{!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store','class'=>'dropzone'])!!}


{!! Form::close() !!}



@endsection 

@section('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
@endsection