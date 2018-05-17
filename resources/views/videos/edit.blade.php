@extends('layouts.app')

@section('content')

<h1>Edit Post</h1>
{!! Form::open(['action'=>['VideoController@update',$video->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    
        <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textArea('body',$video->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}}
    </div>
    <div class="form-group">
        {{Form::file('post_video')}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
     
@endsection