@extends('layouts.app')

@section('content')

<h1>Edit Post</h1>
{!! Form::open(['action'=>['PhotosController@update',$photo->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    
        <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textArea('body',$photo->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}}
    </div>
    <div class="form-group">
        {{Form::file('post_image')}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
     
@endsection