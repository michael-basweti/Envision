@extends('layouts.app')

@section('content')
<div class="row" style="margin-left:2px">
    <div class="col-md-6">
        {!! Form::open(['action'=>'ProfilephotoController@update','method'=>'POST','enctype'=>'multipart/form-data']) !!}
      @csrf
      <div class="row" >
          <div class="col-md-6">
            <div class="form-group">
            {{Form::label('first_name','First Name')}}
            {{Form::text('first_name',$user->first_name,['class'=>'form-control','placeholder'=>'First Name'])}}
            </div>
          </div>
          <div class="col-md-6">
               <div class="form-group">
                {{Form::label('second_name','Last Name')}}
                {{Form::text('second_name', $user->second_name,['class'=>'form-control','placeholder'=>'Last Name'])}}
                </div>
          </div>
      </div>
       <div class="form-group">
           {{Form::label('description','Description')}}                
           {{Form::textArea('description',$user->description,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'inspire one person today','rows'=>5])}}
        </div>
        <div class="row" >
          <div class="col-md-6">
        <div class="form-group">
         {{Form::label('nick_name','Nick Name')}}
                {{Form::text('nick_name',$user->nick_name,['class'=>'form-control','placeholder'=>'Nick Name'])}}
         </div>
          </div>
          <div class="col-md-6">
        <div class="form-group">
            {{Form::label('phone','Phone Number')}}
            {{Form::number('phone',$user->phone,['class'=>'form-control','placeholder'=>'Phone No.'])}}
            
        </div>
        </div>
        </div>
        <div class="row" >
          <div class="col-md-6">
        <div class="form-group">
         {{Form::label('home_town','Home Town')}}
                {{Form::text('home_town',$user->home_town,['class'=>'form-control','placeholder'=>'Home Town'])}}
         </div>
          </div>
          <div class="col-md-6">
        <div class="form-group">
            {{Form::label('current_city','Current City')}}
            {{Form::text('current_city',$user->current_city,['class'=>'form-control','placeholder'=>'Current City'])}}
            
        </div>
        </div>
        </div>
         <div class="row" >
          <div class="col-md-6">
        <div class="form-group">
         {{Form::label('website','Website')}}
                {{Form::text('website',$user->website,['class'=>'form-control','placeholder'=>'website'])}}
         </div>
          </div>
          <div class="col-md-6">
        <div class="form-group">
            {{Form::label('Gender','Gender')}}
            {{Form::select('Gender', ['Male' => 'Male', 'Femle' => 'Female'], $user->Gender) }}
            
        </div>
        </div>
        </div>
        <div class="form-group">
        {{Form::label('year','Date of Birth')}}
         {{Form::date('year',$user->year)}} 
        </div>

                                     
       {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                                        
    {!! Form::close() !!}
    </div>
</div>

  


     

@endsection