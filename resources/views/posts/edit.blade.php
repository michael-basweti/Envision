@extends('layouts.app')

@section('content')


{!! Form::open(['action'=>['PostsController@update',$post->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    
        <div class="form-group">
        
        {{Form::textArea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body','cols'=>5])}}
    </div>
    
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

@endsection